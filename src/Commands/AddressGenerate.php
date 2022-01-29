<?php

namespace Eskiell\FocusAddress\Commands;

use Eskiell\FocusAddress\Models\Cities;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class CitiesGenerate extends Command
{
    protected $signature = 'cities:generate {--fresh}';
    protected $description = 'Generates cities from Brazil';

    public function handle()
    {
        $options = $this->options();
        if ($options['fresh']) {
            Cities::query()->delete();
        }
    }
}