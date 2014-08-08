<?php namespace GeneaLabs\Bones\Flash;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bindShared('flash', function () {
            return $this->app->make('GeneaLabs\Notifications\FlashNotifier');
        });
    }
}
 