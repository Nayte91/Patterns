<?php declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

class Order
{
    private State $state;

    public function __construct()
    {
        $this->state = new StateCreated();
    }

    public function __toString(): string
    {
        return (string) $this->state;
    }

    public function setState(State $state)
    {
        $this->state = $state;
    }

    public function proceedToNext(): void
    {
        $this->state->proceedToNext($this);
    }
}