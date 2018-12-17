<?php

namespace NtSchool\Notifier;

final class NotifierObserver implements NotifierObserverInterface
{
    private $adapters = [];

    public function add(NotifierAdapterInterface $adapter)
    {
        $this->adapters[] = $adapter;
    }

    public function info(string $message)
    {
        foreach ($this->adapters as $adapter) {
            $adapter->info($message);
        }
    }

    public function debug(string $message)
    {
        foreach ($this->adapters as $adapter) {
            $adapter->debug($message);
        }
    }

    public function error(string $message)
    {
        foreach ($this->adapters as $adapter) {
            $adapter->error($message);
        }
    }

    public function warning(string $message)
    {
        foreach ($this->adapters as $adapter) {
            $adapter->warning($message);
        }
    }

    public function alert(string $message)
    {
        foreach ($this->adapters as $adapter) {
            $adapter->alert($message);
        }
    }

    public function critical(string $message)
    {
        foreach ($this->adapters as $adapter) {
            $adapter->critical($message);
        }
    }

    public function emergency(string $message)
    {
        foreach ($this->adapters as $adapter) {
            $adapter->emergency($message);
        }
    }

    public function notice(string $message)
    {
        foreach ($this->adapters as $adapter) {
            $adapter->notice($message);
        }
    }
}