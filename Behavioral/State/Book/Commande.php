<?php

namespace State;

require_once 'ListeProduit.php';
require_once 'CommandeEnCours.php';
require_once 'Produit.php';

class Commande
{
    protected $produits;
    protected $etatCommande;

    public function __construct()
    {
        $this->produits = new ListeProduit();
        $this->etatCommande = new CommandeEnCours($this);
    }

    public function ajouteProduit(Produit $produit): void
    {
        $this->etatCommande->ajouteProduit($produit);
    }

    public function retireProduit(Produit $produit): void
    {
        $this->etatCommande->retireProduit($produit);
    }

    public function annule(): void
    {
        $this->etatCommande->annule();
    }

    public function etatSuivant()
    {
        $this->etatCommande = $this->etatCommande->etatSuivant();
    }

    public function getProduits()
    {
        return $this->produits;
    }

    public function affiche(): void
    {
        echo "****************\nContenu de la commande : \n";
        foreach ($this->produits as $produit) {
            echo "  ";
            $produit->affiche();
        }
        echo "Nombre d'items : " . $this->produits->getIterator()->count() . "\n";
        echo "Etat de la commande : " . $this->etatCommande . "\n";
    }
}