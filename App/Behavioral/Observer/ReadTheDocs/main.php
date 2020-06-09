<?php

use App\Behavioral\Observer\ReadTheDocs\User;
use App\Behavioral\Observer\ReadTheDocs\UserObserver;

$observer = new UserObserver();

$user = new User();
$user->attach($observer);

$user->changeEmail('foo@bar.com');
