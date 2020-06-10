<?php declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

class StateCreated implements State
{
    public function proceedToNext(Order $order): void
    {
        $order->setState(new StateShipped());
    }

    public function __toString(): string
    {
        return 'created';
    }
}