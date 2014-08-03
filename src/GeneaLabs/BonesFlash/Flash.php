<?php namespace GeneaLabs\BonesFlash;

use Illuminate\Support\Facades\Facade;

class Flash extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flash';
    }
}
