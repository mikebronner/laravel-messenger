<?php namespace GeneaLabs\LaravelMessenger\Tests\Feature;

use GeneaLabs\LaravelMessenger\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessengerTest extends TestCase
{
    public function testBootstrap3TestPageCanLoad()
    {
        $response = $this->get(route('genealabs-laravel-messenger.tests.bootstrap3'));

        $response->assertStatus(200);
    }

    public function testBootstrap4TestPageCanLoad()
    {
        $response = $this->get(route('genealabs-laravel-messenger.tests.bootstrap4'));

        $response->assertStatus(200);
    }

    public function testDeliveryOfSuccessMessageForBootstrap3()
    {
        app('messenger')->send(
            'success message with <a href="">link</a>.',
            'title with <a href="">link</a>',
            'success',
            true,
            'bootstrap3'
        );

        $response = $this->get(
            route('genealabs-laravel-messenger.tests.bootstrap4')
        );

        $response->assertStatus(200);
        $response->assertSee('<p>success message with <a href="">link</a>.</p>');
        $response->assertSee('<h4>title with <a href="">link</a></h4>');
        $response->assertSee('<div class="genealabs-laravel-messenger alert alert-dismissable alert-success" role="alert">');
    }

    public function testDeliveryOfSuccessMessageForBootstrap4()
    {
        app('messenger')->send(
            'success message with <a href="">link</a>.',
            'title with <a href="">link</a>',
            'success',
            true,
            'bootstrap4'
        );

        $response = $this->get(
            route('genealabs-laravel-messenger.tests.bootstrap4')
        );

        $response->assertStatus(200);
        $response->assertSee('<p>success message with <a href="">link</a>.</p>');
        $response->assertSee('<h4>title with <a href="">link</a></h4>');
        $response->assertSee('<div class="genealabs-laravel-messenger alert alert-dismissable alert-success" role="alert">');
    }

    public function testDeliveryOfModalMessageForBootstrap3()
    {
        app('messenger')->send(
            'success message with <a href="">link</a>.',
            'title with <a href="">link</a>',
            'success',
            true,
            'bootstrap3',
            'modal'
        );

        $response = $this->get(
            route('genealabs-laravel-messenger.tests.bootstrap4')
        );

        $response->assertStatus(200);
        $response->assertSee('<p>success message with <a href="">link</a>.</p>');
        $response->assertSee('<h4 class="modal-title">title with <a href="">link</a></h4>');
        $response->assertSee('<button type="button" class="btn btn-block btn-success" data-dismiss="modal">I Understand</button>');
    }

    public function testDeliveryOfModalMessageForBootstrap4()
    {
        app('messenger')->send(
            'success message with <a href="">link</a>.',
            'title with <a href="">link</a>',
            'success',
            true,
            'bootstrap4',
            'modal'
        );

        $response = $this->get(
            route('genealabs-laravel-messenger.tests.bootstrap4')
        );

        $response->assertStatus(200);
        $response->assertSee('<p>success message with <a href="">link</a>.</p>');
        $response->assertSee('<h4 class="modal-title">title with <a href="">link</a></h4>');
        $response->assertSee('<button type="button" class="btn btn-block btn-success" data-dismiss="modal">I Understand</button>');
    }

    public function testSessionVariablesAreSetWhenSending()
    {
        $message = 'success message with <a href="">link</a>.';
        $title = 'title with <a href="">link</a>';
        $level = 'success';
        $autoHide = true;
        $framework = 'bootstrap4';
        $type = 'modal';

        app('messenger')->send($message, $title, $level,$autoHide, $framework, $type);

        $this->assertEquals(
            $message,
            session('genealabs-laravel-messenger.message')->message
        );
        $this->assertEquals(
            $title,
            session('genealabs-laravel-messenger.message')->title
        );
        $this->assertEquals(
            $level,
            session('genealabs-laravel-messenger.message')->level
        );
        $this->assertEquals(
            $autoHide,
            session('genealabs-laravel-messenger.message')->autoHide
        );
        $this->assertEquals(
            $framework,
            session('genealabs-laravel-messenger.message')->framework
        );
        $this->assertEquals(
            $type,
            session('genealabs-laravel-messenger.message')->type
        );
    }

    public function testSessionVariablesAreClearedAfterDelivery()
    {
        $message = 'success message with <a href="">link</a>.';
        $title = 'title with <a href="">link</a>';
        $level = 'success';
        $autoHide = true;
        $framework = 'bootstrap4';

        app('messenger')->send($message, $title, $level,$autoHide, $framework);
        $this->get(
            route('genealabs-laravel-messenger.tests.bootstrap4')
        );

        $this->assertNull(session('genealabs-laravel-messenger.message'));
        $this->assertNull(session('genealabs-laravel-messenger.title'));
        $this->assertNull(session('genealabs-laravel-messenger.level'));
        $this->assertNull(session('genealabs-laravel-messenger.autoHide'));
        $this->assertNull(session('genealabs-laravel-messenger.framework'));
    }
}
