<?php

namespace NtSchool\Notifier;

interface NotifierAdapterInterface
{
    public function debug(string $message);

    public function info(string $message);

    public function notice(string $message);

    public function warning(string $message);

    public function error(string $message);

    public function critical(string $message);

    public function alert(string $message);

    public function emergency(string $message);
}
