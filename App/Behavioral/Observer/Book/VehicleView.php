<?php

namespace Observer;
require_once 'Observer.php';

class VehicleView implements Observer
{
    private Vehicle $vehicle;

    private string $text;

    private string $viewName;

    public function __construct(string $viewName, Vehicle $vehicle)
    {
        $this->viewName = $viewName;
        $this->vehicle = $vehicle;
        $vehicle->attach($this);
        $this->updateText();
    }

    private function updateText()
    {
        $this->text =
            $this->viewName
            .' : "'
            .$this->vehicle->getDescription()
            .'", Price : '
            .number_format($this->vehicle->getPrice(), 2);
    }

    public function render()
    {
        echo $this->text."\n";
    }

    public function update(): void
    {
        $this->updateText();
        $this->render();
    }
}