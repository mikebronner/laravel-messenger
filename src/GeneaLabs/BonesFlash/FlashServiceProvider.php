<?php namespace GeneaLabs\BonesFlash;

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
 