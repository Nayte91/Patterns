<?php

namespace State;

require_once 'Produit.php';

class ListeProduit implements \IteratorAggregate
{
    /**
     * @var \ArrayObject
     */
    protected $produits;

    public function __construct()
    {
        $this->produits = new \ArrayObject;
    }

    public function add(Produit $produit): void
    {
        $this->produits->append($produit);
    }

    public function remove(Produit $produit): void
    {
        foreach ($this->produits as $key => $value) {
            if ($value == $produit) {
                $this->produits->offsetUnset($key);
                break;
            }
        }
    }

    public function clear(): void
    {
        $this->produits = new \ArrayObject;
    }

    public function getIterator(): \ArrayIterator
    {
        return $this->produits->getIterator();
    }
}