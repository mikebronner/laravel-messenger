<?php

declare(strict_types=1);

namespace GeneaLabs\LaravelMessenger\Console\Commands;

use Illuminate\Console\Command;
use GeneaLabs\LaravelMessenger\Providers\Service;

class Publish extends Command
{
    protected $signature = 'messenger:publish {--config} {--views}';
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

        if ($this->option('views')) {
            $this->call('vendor:publish', [
                '--provider' => Service::class,
                '--tag' => ['views'],
                '--force' => true,
            ]);
        }
    }
}
