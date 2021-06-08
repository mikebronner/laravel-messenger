<?php

declare(strict_types=1);

namespace GeneaLabs\LaravelMessenger\Providers;

use Exception;
use GeneaLabs\LaravelMessenger\Messenger;
use GeneaLabs\LaravelMessenger\Console\Commands\Publish;
use Illuminate\Support\ServiceProvider;

class Service extends ServiceProvider
{
    protected $defer = false;

    public function boot(): void
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__ . '/../../routes/web.php';
        }

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'genealabs-laravel-messenger'
        );
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/genealabs/laravel-messenger'),
        ]);

        $configPath = __DIR__ . '/../../config/genealabs-laravel-messenger.php';
        $this->mergeConfigFrom($configPath, 'genealabs-laravel-messenger');
        $this->publishes([
            $configPath => config_path('genealabs-laravel-messenger.php')
        ], 'config');
    }

    public function register(): void
    {
        $this->commands(Publish::class);

        $this->app->singleton('messenger', function () {
            return new Messenger;
        });
        $this->registerBladeDirective('deliver');
        $this->registerBladeDirective('send');
    }

    private function registerBladeDirective($formMethod, $alias = null): void
    {
        $alias = $alias ?: $formMethod;
        $blade = app('view')->getEngineResolver()
            ->resolve('blade')
            ->getCompiler();

        if (array_key_exists($alias, $blade->getCustomDirectives())) {
            throw new Exception("Blade directive '{$alias}' is already registered.");
        }

        $blade->directive($alias, function ($parameters) use ($formMethod) {
            $parameters = trim($parameters, "()");

            return "<?php echo app('messenger')->{$formMethod}({$parameters}); ?>";
        });
    }

    public function provides(): array
    {
        return [
            'genealabs-laravel-messenger',
        ];
    }
}
