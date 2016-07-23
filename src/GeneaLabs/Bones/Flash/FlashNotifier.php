<?php namespace GeneaLabs\Bones\Flash;

use Illuminate\Support\Facades\Session;

final class FlashNotifier
{
    public function success($message)
    {
        $this->message($message, 'success');
    }

    public function info($message)
    {
        $this->message($message);
    }

    public function warning($message)
    {
        $this->message($message, 'warning');
    }

    public function danger($message)
    {
        $this->message($message, 'danger');
    }

    public function modal($message)
    {
        $this->message($message);
        Session::put('flashNotification.modal', true);
    }

    private function message($message, $level = 'info')
    {
        Session::put('flashNotification.message', $message);
        Session::put('flashNotification.level', $level);
    }
}
