<?php namespace GeneaLabs\LaravelMessenger;

use Illuminate\View\View;

class Messenger
{
    public function deliver() : View
    {
        $framework = session('genealabs-laravel-messenger.framework');
        $type = session('genealabs-laravel-messenger.type');
        $autoHide = session('genealabs-laravel-messenger.autoHide');
        $title = session('genealabs-laravel-messenger.title');
        $message = session('genealabs-laravel-messenger.message');
        $level = session('genealabs-laravel-messenger.level');
        $section = config('genealabs-laravel-messenger.javascript-blade-section');

        session()->forget('genealabs-laravel-messenger.autoHide');
        session()->forget('genealabs-laravel-messenger.framework');
        session()->forget('genealabs-laravel-messenger.level');
        session()->forget('genealabs-laravel-messenger.message');
        session()->forget('genealabs-laravel-messenger.title');
        session()->forget('genealabs-laravel-messenger.type');

        if (! $framework || ! $type) {
            return view("genealabs-laravel-messenger::empty");
        }

        return view("genealabs-laravel-messenger::{$framework}.{$type}")->with([
            'autoHide' => $autoHide,
            'message' => $message,
            'level' => $level,
            'section' => $section,
            'title' => $title,
        ]);
    }

    public function send(
        string $message,
        string $title = null,
        string $level = null,
        bool $autoHide = null,
        string $framework = null,
        string $type = null
    ) {
        $framework = $this->getValueOrDefault(
            $framework,
            config('genealabs-laravel-messenger.framework')
        );
        $level = $this->getValueOrDefault(
            $level,
            'info',
            ['info', 'success', 'warning', 'danger']
        );
        $type = $this->getValueOrDefault($type, 'alert', ['alert', 'modal']);

        session([
            'genealabs-laravel-messenger.autoHide' => $autoHide,
            'genealabs-laravel-messenger.framework' => $framework,
            'genealabs-laravel-messenger.level' => $level,
            'genealabs-laravel-messenger.message' => $message,
            'genealabs-laravel-messenger.title' => $title,
            'genealabs-laravel-messenger.type' => $type,
        ]);
    }

    protected function getValueOrDefault($value, $default, array $haystack = [])
    {
        if (count($haystack)) {
            return in_array($value, $haystack) ? $value : $default;
        }

        return $value ?: $default;
    }
}
