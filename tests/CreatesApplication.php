<?php namespace GeneaLabs\LaravelMessenger\Tests;

use GeneaLabs\LaravelMessenger\Providers\Service as LaravelMessengerService;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    public function createApplication()
    {
        $this->loadRoutes();
        $app = require __DIR__ . '/../vendor/laravel/laravel/bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
        $app->register(LaravelMessengerService::class);

        return $app;
    }

    protected function loadRoutes()
    {
        $routes = file_get_contents(__DIR__ . '/../routes/web.php');
        file_put_contents(__DIR__ . '/../vendor/laravel/laravel/routes/web.php', $routes);
    }
}
