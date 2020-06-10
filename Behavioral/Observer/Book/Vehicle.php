<?php

namespace Observer;

require_once 'Subject.php';

class Vehicle extends Subject
{
    private string $description;

    private int $price;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $newDescription): void
    {
        $this->description = $newDescription;
        $this->notify();
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $newPrice): void
    {
        $this->price = $newPrice;
        $this->notify();
    }
}