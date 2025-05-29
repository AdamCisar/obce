<?php
declare(strict_types=1);

namespace App\Imports;

use App\Contracts\ImportContract;
use App\Exceptions\ImportFailedException;
use Symfony\Component\DomCrawler\Crawler;

class CityImporter implements ImportContract {

    private const URL = 'https://www.e-obce.sk/kraj/NR.html';

    public function import(): bool 
    {
        if (!$this->prepare()) {
            throw new ImportFailedException('Import preparation failed');
        }

        return true;
    }

    private function prepare(): bool
    {
        $starTime = microtime(true);
        $districtLinks = $this->getDistrictLinks(self::URL);
        $cityLinks = $this->getCitiesLinks($districtLinks);
        $cityData = $this->getCitiesData($cityLinks);

        $endTime = microtime(true);
        $executionTime = $endTime - $starTime;
        dd($executionTime);

        dd($cityData[0]);
        return true;
    }

    private function getDistrictLinks(string $url): array 
    {
        $links = [];

        $html = $this->fetchHtml(self::URL);
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
            if (!in_array(trim($node->nodeValue), $fields)) {
                continue;
            }

            $crawler = new Crawler($node);

            $info[trim($node->nodeValue)] = trim($crawler->nextAll()->text());
        }

        return $info;
    }
}