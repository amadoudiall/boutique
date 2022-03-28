<?php
namespace App\Entity;

class Commande{
    // Commande
    public $userId;
    public $createdAt;
    public $chipedAt;
    public $status;
    public $montant;
    public $adresse;
    
    // Commande_product
    public $commandeId;
    public $productId;
    public $quantity;
    public $priceU;
    public $priceT;
    
    
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
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of chipedAt
     */ 
    public function getChipedAt()
    {
        return $this->chipedAt;
    }

    /**
     * Set the value of chipedAt
     *
     * @return  self
     */ 
    public function setChipedAt($chipedAt)
    {
        $this->chipedAt = $chipedAt;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

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

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }
    
    
    // Commande_product

    /**
     * Get the value of commandeId
     */ 
    public function getCommandeId()
    {
        return $this->commandeId;
    }

    /**
     * Set the value of commandeId
     *
     * @return  self
     */ 
    public function setCommandeId($commandeId)
    {
        $this->commandeId = $commandeId;

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

    /**
     * Get the value of priceU
     */ 
    public function getPriceU()
    {
        return $this->priceU;
    }

    /**
     * Set the value of priceU
     *
     * @return  self
     */ 
    public function setPriceU($priceU)
    {
        $this->priceU = $priceU;

        return $this;
    }

    /**
     * Get the value of priceT
     */ 
    public function getPriceT()
    {
        return $this->priceT;
    }

    /**
     * Set the value of priceT
     *
     * @return  self
     */ 
    public function setPriceT($priceT)
    {
        $this->priceT = $priceT;

        return $this;
    }
    
    // getALLCommande
    public function getAllCommande()
    {
        $sql = "SELECT * FROM commande";
        $result = $this->getDb()->query($sql);
        $commande = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $commande;
    }
    
    // getALLCommandeByUserId
    public function getAllCommandeByUserId($userId)
    {
        $sql = "SELECT * FROM commande WHERE User_id = $userId";
        $result = $this->getDb()->query($sql);
        $commande = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $commande;
    }
    
    // getProductByCommandeId
    public function getProductByCommandeId($commandeId)
    {
        $sql = "SELECT * FROM commande_product WHERE commande_id = $commandeId";
        $result = $this->getDb()->query($sql);
        $commande = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $commande;
    }
}