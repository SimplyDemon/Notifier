<?php

namespace NtSchool\Notifier;

interface NotifierObserverInterface extends NotifierAdapterInterface
{
    public function add(NotifierAdapterInterface $adapter);
}
