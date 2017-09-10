<?php namespace GeneaLabs\LaravelMessenger\Providers;

use Exception;
use Illuminate\Support\ServiceProvider;

class Service extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'genealabs-laravel-messenger');
        $configPath = __DIR__ . '/../../config/genealabs-laravel-messenger.php';
        $this->publishes([
            $configPath => config_path('genealabs-laravel-messenger.php')
        ], 'config');
    }

    public function register()
    {
        $this->registerBladeDirective('deliver');
        $this->registerBladeDirective('send');
    }

    private function registerBladeDirective($formMethod, $alias = null)
    {
        $alias = $alias ?: $formMethod;

        if (array_key_exists($alias, app('blade.compiler')->getCustomDirectives())) {
            throw new Exception("Blade directive '{$alias}' is already registered.");
        }

        app('blade.compiler')->directive($alias, function ($parameters) use ($formMethod) {
            $parameters = trim($parameters, "()");

            return "<?php echo app('messenger')->{$formMethod}({$parameters}); ?>";
        });
    }

    public function provides() : array
    {
        return array('genealabs-laravel-messenger');
    }
}
