<?php

namespace State;

require_once 'Commande.php';
require_once 'Produit.php';

abstract class EtatCommande
{
    protected $commande;

    public function __construct(Commande $commande)
    {
        $this->commande = $commande;
    }

    public abstract function __toString(): string;

    public abstract function ajouteProduit(Produit $produit): void;

    public abstract function retireProduit(Produit $produit): void;

    public abstract function annule(): void;

    public abstract function etatSuivant():EtatCommande;
}