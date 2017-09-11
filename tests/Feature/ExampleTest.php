<?php namespace GeneaLabs\LaravelMessenger\Tests\Feature;

use GeneaLabs\LaravelMessenger\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
