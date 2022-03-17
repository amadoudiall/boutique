<?php
namespace App\Entity;
use App\Bdd\Bdd;
use App\Entity\User;
use App\Entity\Product;

class Panier{
    
    public $userId;
    public $montant;
    // Panier_product
    public $panierId;
    public $productId;
    public $quantity;
    
    // la bdd
    public function getDb()
    {
        $bdd = new Bdd();
        $this->database = $bdd->connect();
        return $this->database;
    }
    
    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
    
    /**
     * Get the value of montant
     */ 
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @return  self
     */ 
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }
    
    // Panier_product Getters & Stters
    
     /**
     * Get the value of panierId
     */ 
    public function getPanierId()
    {
        return $this->panierId = $this->getDb()->lastInsertId();
    }

    /**
     * Set the value of panierId
     *
     * @return  self
     */ 
    public function setPanierId($panierId)
    {
        $this->panierId = $panierId;

        return $this;
    }

    /**
     * Get the value of productId
     */ 
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set the value of productId
     *
     * @return  self
     */ 
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
    
    public function getPanier()
    {
        $products = $this->getDb()->query('SELECT * FROM Panier');
        return $products->fetchAll();
    }
    
    public function getProductPanier($panierId)
    {
        $products = $this->getDb()->prepare('SELECT * FROM Panier_product WHERE id= ?');
        $products->execute(array($panierId));
        return $products->fetchAll();
    }
    
    public function flushPanier()
    {
        $addPanier = $this->getDb()->prepare('INSERT INTO Panier(User_id, montant) VALUES(:User_id, :montant)');
        $addPanier->execute([
            'User_id' => $this->userId,
            'montant' => $this->montant
        ]);
        
        $addProduct = $this->getDb()->prepare('INSERT INTO Panier_product(Panier_id, Product_id, quantity) VALUES(:Panier_id, :Product_id, :quantity)');
        $addProduct->execute([
            'Panier_id' => $this->panierId,
            'Product_id' => $this->productId,
            'quantity' => $this->quantity
        ]);
    }
    
}