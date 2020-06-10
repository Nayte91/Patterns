<?php

namespace State;

class Produit
{
    protected $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function affiche()
    {
        echo "Produit : " . $this->nom . "\n";
    }
}