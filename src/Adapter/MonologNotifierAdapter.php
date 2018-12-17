<?php

namespace NtSchool\Notifier\Adapter;

use NtSchool\Notifier\NotifierAdapterInterface;
use Monolog\Logger;

/**
 * Class MonologNotifierAdapter
 * @package NtSchool\Notifier\Adapter
 */
final class MonologNotifierAdapter implements NotifierAdapterInterface
{
    /** @var Logger */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function debug(string $message)
    {
        $this->logger->debug($message);
    }

    public function info(string $message)
    {
        $this->logger->info($message);
    }

    public function notice(string $message)
    {
        $this->logger->notice($message);
    }

    public function warning(string $message)
    {
        $this->logger->warning($message);
    }

    public function error(string $message)
    {
        $this->logger->error($message);
    }

    public function critical(string $message)
    {
        $this->logger->critical($message);
    }

    public function alert(string $message)
    {
        $this->logger->alert($message);
    }

    public function emergency(string $message)
    {
        $this->logger->emergency($message);
    }
}