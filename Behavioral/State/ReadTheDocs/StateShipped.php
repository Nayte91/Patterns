<?php declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

class StateShipped implements State
{
    public function proceedToNext(Order $order): void
    {
        $order->setState(new StateDone());
    }

    public function __toString(): string
    {
        return 'Shipped';
    }
}