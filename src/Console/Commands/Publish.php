<?php namespace GeneaLabs\LaravelMessenger\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Kernel;
use GeneaLabs\LaravelMessenger\Providers\Service;

class Publish extends Command
{
    protected $signature = 'messenger:publish {--config}';
    protected $description = 'Publish configuration file of the Laravel Messenger package.';

    public function handle()
    {
        if ($this->option('config')) {
            $this->call('vendor:publish', [
                '--provider' => Service::class,
                '--tag' => ['config'],
                '--force' => true,
            ]);
        }
    }
}
