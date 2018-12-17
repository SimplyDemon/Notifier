<?php
/**
 * Created by PhpStorm.
 * User: stanislas
 * Date: 14.12.18
 * Time: 20:24
 */

namespace NtSchool\Notifier\Adapter;

use NtSchool\Notifier\NotifierAdapterInterface;

final class TelegramNotifierAdapter implements NotifierAdapterInterface
{
    private $url = "https://api.telegram.org/bot<token>/sendMessage?chat_id=<chat_id>&text=";

    public function __construct(string $botToken, string $chatId)
    {
        $this->url = str_replace('<token>', $botToken, $this->url);
        $this->url = str_replace('<chat_id>', $chatId, $this->url);
    }

    public function debug(string $message)
    {
        file_get_contents($this->url . \urlencode('DEBUG: ' . $message));
    }

    public function info(string $message)
    {
        file_get_contents($this->url . \urlencode('INGO : ' . $message));
    }

    public function notice(string $message)
    {
        file_get_contents($this->url . \urlencode('NOTICE: ' . $message));
    }

    public function warning(string $message)
    {
        file_get_contents($this->url . \urlencode('WARNING: ' . $message));
    }

    public function error(string $message)
    {
        file_get_contents($this->url . \urlencode('ERROR: ' . $message));
    }

    public function critical(string $message)
    {
        file_get_contents($this->url . \urlencode('CRITICAL: ' . $message));
    }

    public function alert(string $message)
    {
        file_get_contents($this->url . \urlencode('ALERT: ' . $message));
    }

    public function emergency(string $message)
    {
        file_get_contents($this->url . \urlencode('EMERGENCY: ' . $message));
    }
}
