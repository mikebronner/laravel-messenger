<?php namespace GeneaLabs\Bones\Flash;

use Illuminate\Session\Store;

class FlashNotifier
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

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
        $this->session->flash('flashNotification.modal', true);
    }

    private function message($message, $level = 'info')
    {
        $this->session->flash('flashNotification.message', $message);
        $this->session->flash('flashNotification.level', $level);
    }
}
