<?php

namespace State;

require_once 'Commande.php';
require_once 'Produit.php';

$commande = new Commande;
$commande->ajouteProduit(new Produit('Véhicule 1'));
$commande->ajouteProduit(new Produit('Accessoire 2'));
$commande->affiche();
$commande->etatSuivant();
$commande->ajouteProduit(new Produit('Gadget 3'));
$commande->annule();
$commande->affiche();

$commande2 = new Commande();
$commande2->ajouteProduit(new Produit('véhicule 4'));
$commande2->ajouteProduit(new Produit('Accessoire 5'));
$commande2->affiche();
$commande2->etatSuivant();
$commande2->affiche();
$commande2->etatSuivant();
$commande2->annule();
$commande2->affiche();
