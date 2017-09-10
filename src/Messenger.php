<?php namespace GeneaLabs\LaravelMessenger;

class Messenger
{
    public function deliver()
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
// dd($framework, $type);
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
        session([
            'genealabs-laravel-messenger.autoHide' => $autoHide
                ?: false,
            'genealabs-laravel-messenger.framework' => $framework
                ?: config('genealabs-laravel-messenger.framework'),
            'genealabs-laravel-messenger.level' =>
                in_array($level, ['info', 'success', 'warning', 'danger'])
                    ? $level
                    : 'info',
            'genealabs-laravel-messenger.message' => $message,
            'genealabs-laravel-messenger.title' => $title
                ?: '',
            'genealabs-laravel-messenger.type' =>
                in_array($type, ['alert', 'modal'])
                    ? $type
                    : 'alert',
        ]);
    }
}
