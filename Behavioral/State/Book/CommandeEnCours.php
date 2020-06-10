<?php

namespace State;

require_once 'Commande.php';
require_once 'Produit.php';
require_once 'EtatCommande.php';
require_once 'CommandeValidee.php';

final class CommandeEnCours extends EtatCommande
{
    public function ajouteProduit(Produit $produit): void
    {
        $this->commande->getProduits()->add($produit);
    }

    public function retireProduit(Produit $produit): void
    {
        $this->commande->getProduits()->remove($produit);
    }

    public function annule(): void
    {
        $this->commande->getProduits()->clear();
    }

    public function etatSuivant(): EtatCommande
    {
        return new CommandeValidee($this->commande);
    }

    public function __toString(): string
    {
        return "En cours";
    }
}