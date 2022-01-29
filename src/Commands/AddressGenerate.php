<?php

namespace Eskiell\FocusAddress\Commands;

use Eskiell\FocusAddress\Models\Cities;
use Eskiell\FocusAddress\Models\States;
use Eskiell\FocusAddress\Models\ZipCode;
use Illuminate\Console\Command;

class AddressGenerate extends Command
{
    protected $signature = 'address:generate {--fresh}';
    protected $description = 'Generates states->cities->zipcode from Brazil';

    public function handle()
    {
        $options = $this->options();
        if ($options['fresh']) {
            $this->info('Deleting states');
            States::query()->delete();
            $this->info('all states is removed');
            $this->info('Deleting Cities');
            Cities::query()->delete();
            $this->info('all cities is removed');
            $this->info('Deleting zipcode');
            ZipCode::query()->delete();
            $this->info('all zipcode is removed');
        }
    }
}