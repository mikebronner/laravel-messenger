<?php namespace GeneaLabs\LaravelMessenger\Tests\Unit\Console\Commands;

use GeneaLabs\LaravelMessenger\Tests\TestCase;

class PublishTest extends TestCase
{
    public function testConfigFileGetsPublished()
    {
        app('artisan')::getFacadeRoot()->call('messenger:publish', ['--config' => true]);

        $this->assertFileExists(base_path('config/genealabs-laravel-messenger.php'));
    }

    public function testConfigFileContainsCorrectSettings()
    {
        $settings = file_get_contents(base_path('config/genealabs-laravel-messenger.php'));

        $this->assertStringContainsString("'framework' => 'bootstrap4',", $settings);
        $this->assertStringContainsString("'javascript-blade-section' => 'js',", $settings);
    }
}
