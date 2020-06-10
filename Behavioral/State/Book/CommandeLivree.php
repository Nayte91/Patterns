<?php

namespace State;

require_once 'Commande.php';
require_once 'Produit.php';
require_once 'EtatCommande.php';

final class CommandeLivree extends EtatCommande
{
    public function ajouteProduit(Produit $produit): void { }

    public function retireProduit(Produit $produit): void { }

    public function annule(): void { }

    public function etatSuivant(): EtatCommande
    {
        return $this;
    }

    public function __toString(): string
    {
        return "Livrée";
    }
}