<?php namespace GeneaLabs\LaravelMessenger;

use Illuminate\View\View;

class Messenger
{
    public function deliver() : View
    {
        $message = session('genealabs-laravel-messenger.message');
        session()->forget('genealabs-laravel-messenger.message');

        if (! $message) {
            return view("genealabs-laravel-messenger::empty");
        }

        return view("genealabs-laravel-messenger::{$message->framework}.{$message->type}")->with([
            'autoHide' => $message->autoHide,
            'message' => $message->message,
            'level' => $message->level,
            'section' => $message->section,
            'title' => $message->title,
        ]);
    }

    public function send(
        string $text,
        string $title = null,
        string $level = null,
        bool $autoHide = null,
        string $framework = null,
        string $type = null
    ) {
        $message = new Message([
            'message' => $text,
            'title' => $title,
            'level' => $level,
            'autoHide' => $autoHide,
            'framework' => $framework,
            'type' => $type,
        ]);

        if ($text) {
            session(['genealabs-laravel-messenger.message' => $message]);
        }
    }
}
