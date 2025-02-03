<?php

namespace Arthu\tests;

use Arthu\TestUnitaire\ProduitExistantException;
use Arthu\TestUnitaire\QuantiteInvalideException;
use Arthu\TestUnitaire\StockManager;
use PHPUnit\Framework\TestCase;


class StockManagerTest extends TestCase
{
    /**
     * cette méthode va tester l'ajout de deux produits
     * @return void
     */
    public function testAjouterProduit() {
        $stockManager = new StockManager();

        $produit1 = [
            'id' => 1,
            'nom' => 'Produit 1',
            'quantité' => 10,
            'catégorie' => 'Catégorie 1'
        ];

        $produit2 = [
            'id' => 2,
            'nom' => 'Produit 2',
            'quantité' => 5,
            'catégorie' => 'Catégorie 2'
        ];

        $stockManager->ajouterProduit($produit1);
        $stockManager->ajouterProduit($produit2);
        $this->assertCount(2, $stockManager->getProduits());
    }

    /**
     * cette méthode va tester l'ajout de deux produits avec le meme id
     * @return void
     * @throws ProduitExistantException
     */
    public function testAjouterProduitLeMemeId() {
        $stockManager = new StockManager();

        $produit1 = [
            'id' => 1,
            'nom' => 'Produit 1',
            'quantité' => 10,
            'catégorie' => 'Catégorie 1'
        ];

        $produit2 = [
            'id' => 1,
            'nom' => 'Produit 2',
            'quantité' => 5,
            'catégorie' => 'Catégorie 2'
        ];

        $this->expectException(ProduitExistantException::class);
        $this->expectExceptionMessage("Le produit avec l'ID 1 existe déjà.");

        $stockManager->ajouterProduit($produit1);
        $stockManager->ajouterProduit($produit2);
    }

    public function testAjouterProduitQuantiteNeg() {
        $stockManager = new StockManager();

        $produit1 = [
            'id' => 1,
            'nom' => 'Produit 1',
            'quantité' => -2,
            'catégorie' => 'Catégorie 1'
        ];

        $this->expectException(QuantiteInvalideException::class);
        $this->expectExceptionMessage("La quantité ne peut pas être négative ou nulle.");

        $stockManager->ajouterProduit($produit1);
    }
}