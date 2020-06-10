<?php

namespace State;

require_once 'Commande.php';
require_once 'Produit.php';
require_once 'EtatCommande.php';
require_once 'CommandeLivree.php';

final class CommandeValidee extends EtatCommande
{
    public function ajouteProduit(Produit $produit): void { }

    public function retireProduit(Produit $produit): void { }

    public function annule(): void
    {
        $this->commande->getProduits()->clear();
    }

    public function etatSuivant(): EtatCommande
    {
        return new CommandeLivree($this->commande);
    }

    public function __toString(): string
    {
        return "Validée";
    }
}