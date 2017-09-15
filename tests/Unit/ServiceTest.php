<?php namespace GeneaLabs\LaravelMessenger\Tests\Unit;

use Exception;
use GeneaLabs\LaravelMessenger\Providers\Service;
use GeneaLabs\LaravelMessenger\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceTest extends TestCase
{
    public function testServiceProviderHint()
    {
        $expectedResult = ['genealabs-laravel-messenger'];
        $actualResult = (new Service(app()))->provides();

        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testBladeDirectiveConflictThrowsException()
    {
        $this->expectException(Exception::class);
        $response = (new Service(app()))->register();
    }
}
