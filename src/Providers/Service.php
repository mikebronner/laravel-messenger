<?php namespace GeneaLabs\LaravelMessenger\Providers;

use Exception;
use GeneaLabs\LaravelMessenger\Messenger;
use Illuminate\Support\ServiceProvider;

class Service extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'genealabs-laravel-messenger');
        $configPath = __DIR__ . '/../../config/genealabs-laravel-messenger.php';
        $this->mergeConfigFrom($configPath, 'genealabs-laravel-messenger');
        $this->publishes([
            $configPath => config_path('genealabs-laravel-messenger.php')
        ], 'config');
    }

    public function register()
    {
        $this->app->singleton('messenger', function () {
            return new Messenger();
        });
        $this->registerBladeDirective('deliver');
        $this->registerBladeDirective('send');
    }

    private function registerBladeDirective($formMethod, $alias = null)
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

    public function provides() : array
    {
        return array('genealabs-laravel-messenger');
    }
}
