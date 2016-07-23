<?php namespace GeneaLabs\Bones\Flash;

use Illuminate\Support\Facades\Session;

final class FlashNotifier
{
    public function success($message, $autoHide = true)
    {
        $this->message($message, 'success', $autoHode);
    }

    public function info($message, $autoHide = false)
    {
        $this->message($message, 'info', $autoHode);
    }

    public function warning($message, $autoHide = false)
    {
        $this->message($message, 'warning', $autoHode);
    }

    public function danger($message, $autoHide = false)
    {
        $this->message($message, 'danger', $autoHode);
    }

    public function modal($message)
    {
        $this->message($message, null, false);
        Session::put('flashNotification.modal', true);
    }

    private function message($message, $level = 'info', $autoHide = false)
    {
        Session::put('flashNotification.message', $message);
        Session::put('flashNotification.level', $level);
        Session::put('flashNotification.autoHide', $autoHide);
    }
}
