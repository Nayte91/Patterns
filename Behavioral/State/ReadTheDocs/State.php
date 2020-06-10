<?php declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

interface State
{
    public function proceedToNext(Order $order): void;

    public function __toString(): string;
}