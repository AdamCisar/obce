<?php

namespace App\Console\Commands;

use App\Imports\NitraCityImporter;
use Illuminate\Console\Command;

class DataImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import {importer}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import city and municipality data from e-obce.sk for Nitra region';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $importerName = $this->argument('importer');
        $importers = config('importer');

        try {
            $importer = app($importers[$importerName] ?? '');
        } catch (\Exception $e) {
             $this->error("Importer '{$importerName}' is not configured. Please configure it in config/importer.php");
             return;
        }

        try {
            $importer->import();
        } catch (\Exception $e) {
            $this->error(
                'Import failed.' . PHP_EOL .
                $e->getMessage() . PHP_EOL .
                'In file: ' . $e->getFile() . ' on line ' . $e->getLine() . PHP_EOL .
                $e->getTraceAsString()
            );

            return;
        }

        $this->info('Import was successful.');
    }
}
