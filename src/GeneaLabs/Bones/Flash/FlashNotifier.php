<?php namespace GeneaLabs\Bones\Flash;

use Illuminate\Support\Facades\Session;

final class FlashNotifier
{
    public function success($message, $autoHide = true)
    {
        $this->message($message, 'success', $autoHide);
    }

    public function info($message, $autoHide = false)
    {
        $this->message($message, 'info', $autoHide);
    }

    public function warning($message, $autoHide = false)
    {
        $this->message($message, 'warning', $autoHide);
    }

    public function danger($message, $autoHide = false)
    {
        $this->message($message, 'danger', $autoHide);
    }

    public function modal($message)
    {
        $this->message($message);
        Session::put('flashNotification.modal', true);
    }

    private function message($message, $level = 'info', $autoHide = false)
    {
        Session::put('flashNotification.message', $message);
        Session::put('flashNotification.level', $level);
        Session::put('flashNotification.autoHide', $autoHide);
    }
}
