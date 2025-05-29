<?php
declare(strict_types=1);

namespace App\Imports;

use App\Contracts\ImportContract;
use App\Exceptions\ImportFailedException;
use App\Models\City;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class CityImporter implements ImportContract {

    private const array URL = ['https://www.e-obce.sk/kraj/NR.html'];

    private array $cityData = [];

    public function __construct(private readonly City $cityModel) {}

    public function import(): void 
    {
        $this->prepare();
        $this->process();
    }

    private function process(): void
    {
        foreach ($this->cityData as $city) {
            $city['coat_of_arms_url'] = $this->saveImageToPublicDirectory($city);
            $this->cityModel->updateOrCreate(['name' => $city['name']], $city);
        }
    }

    private function saveImageToPublicDirectory(array $data): string 
    {
        if (empty($data['coat_of_arms_url'])) {
            return '';
        }

        $imageContents = file_get_contents($data['coat_of_arms_url']);
        $filename = 'coat_of_arms_' . Str::slug($data['name']) . '.' . pathinfo($data['coat_of_arms_url'], PATHINFO_EXTENSION);

        $relativePath = 'coat_of_arms/' . $filename;
        Storage::disk('public')->put($relativePath, $imageContents);

        return Storage::url($relativePath);
    }

    private function prepare(): void
    {
        foreach (self::URL as $url) {
            $districtLinks = $this->getDistrictLinks($url);
            $cityLinks = $this->getCitiesLinks($districtLinks);
            $cityData = $this->getCitiesData($cityLinks);
        }

        $this->cityData = $cityData;
    }

    private function getDistrictLinks(string $url): array 
    {
        $links = [];

        $html = $this->fetchHtml($url);
        $links = $this->getCrawler($html)
            ->filterXPath("//td[contains(text(), 'OKRES:')]//a[contains(@href, 'okres')]")
            ->each($this->trimHref(...));
   
        return $links;
    }

    private function getCitiesLinks(array $districtLinks): array
    {
        $links = [];

        foreach ($districtLinks as $link) {
            $html = $this->fetchHtml($link);
            $cityLinks = $this->getCrawler($html)
                        ->filterXPath("//b[contains(text(), 'Vyberte si obec alebo mesto z okresu')]/following-sibling::table[1]//a[contains(@href, 'obec')]");

            $links = array_merge(
                    $links, 
                    $cityLinks->each(function (Crawler $node) {
                        return ['name' => trim($node->text()), 'href' => $this->trimHref($node)];
                    })
                );
        }

        return $links;
    }
    
    private function getCitiesData(array $cityLinks): array 
    {
        $data = [];

        foreach ($cityLinks as $city) {
            $html = $this->fetchHtml($city['href']);
            $dom = $this->getCrawler($html);

            $data[] = [
                'name' => $city['name'],
                'city_hall_address' => trim($dom->filterXPath("//td[a[starts-with(@href, 'mailto:')]]/preceding-sibling::td[2]")->text()),
                'coat_of_arms_url' => $dom->filterXPath("//td/img[contains(@src, '/erb/')]")->attr('src'),
                ...$this->getContactInfo($dom),
            ];
        }

        return $data;
    }

    public function getContactInfo(Crawler $dom): array
    {
        $contactInfo = [
            'Starosta:' => 'mayor_name',
            'Tel:' => 'phone',
            'Fax:' => 'fax',
            'Email:' => 'email',
            'Web:' => 'web_address',
        ];

        $fields = array_keys($contactInfo);

        $info = [];

        $nodes = $dom->filterXPath("//tr/td[
            contains(normalize-space(), '".implode("') or contains(normalize-space(), '", $fields)."')
        ]");

        foreach ($nodes as $node) {
            $value = trim($node->nodeValue);
            
            if (!in_array($value, $fields)) {
                continue;
            }

            $crawler = new Crawler($node);

            $info[$contactInfo[$value]] = trim($crawler->nextAll()->text());
        }

        return $info;
    }

    private function fetchHtml(string $url): string 
    {
        $html = file_get_contents($url);

        if (empty($html)) {
            throw new ImportFailedException('Failed to fetch HTML');
        }

        return mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
    }

    private function getCrawler(string $html): Crawler 
    {
        return new Crawler($html);
    }

    private function trimHref(Crawler $node): string 
    {
        return trim($node->attr(attribute: 'href'));
    }
}