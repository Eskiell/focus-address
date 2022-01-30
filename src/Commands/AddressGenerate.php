<?php

namespace Eskiell\FocusAddress\Commands;

use Eskiell\FocusAddress\Models\Cities;
use Eskiell\FocusAddress\Models\States;
use Eskiell\FocusAddress\Models\ZipCode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddressGenerate extends Command
{
    protected $signature = 'address:generate';
    protected $description = 'Generates states->cities->zipcode from Brazil';

    public function handle()
    {
        $this->insert(__DIR__ . '/../../database/seeders/states.csv', app(States::class));
        $this->insert(__DIR__ . '/../../database/seeders/cities.csv', app(Cities::class));
        $this->insert(__DIR__ . '/../../database/seeders/zipcode.csv', app(ZipCode::class));
        $this->info('Done');
    }

    private function insert(string $file_dir, $model)
    {
        DB::disableQueryLog();
        $model::query()->delete();
        $head = $model->getFillable();
        if (($handle = fopen($file_dir, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000)) !== false) {
                $this->info('Running csv...' . implode(',', $row));
                $model::query()->insert(array_combine($head, $row));
            }
            fclose($handle);
        }
    }
}