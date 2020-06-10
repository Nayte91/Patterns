<?php declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

class StateDone implements State
{
    public function proceedToNext(Order $order): void { }

    public function __toString(): string
    {
        return 'Done';
    }
}