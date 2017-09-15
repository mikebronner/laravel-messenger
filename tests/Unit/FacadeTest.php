<?php namespace GeneaLabs\LaravelMessenger\Tests\Unit;

use GeneaLabs\LaravelMessenger\Facades\Messenger as Facade;
use GeneaLabs\LaravelMessenger\Messenger;
use GeneaLabs\LaravelMessenger\Tests\TestCase;

class FacadeTest extends TestCase
{
    public function testFacadeProvidesCorrectClass()
    {
        $expectedResult = new Messenger;
        $actualResult = Facade::getFacadeRoot();

        $this->assertEquals($expectedResult, $actualResult);
    }
}
