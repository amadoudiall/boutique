<?php
namespace App\Entity;
use App\Bdd\Bdd;
use App\Entity\User;
use App\Entity\Product;

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
    public $etat;
    
    public function __construct(){
        $this->product = new Product();
    }
    
    
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
    
     /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }
    
    
    // getALLCommande uniquement pour le backOfice
    public function getAllCommande()
    {
        $result = $this->getDb()->query("SELECT * FROM Commande ORDER BY createdAt DESC");
        $commande = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $commande;
    }
    
    // getALLCommandeByUserId
    public function getAllCommandeByUserId($userId)
    {
        $result = $this->getDb()->prepare("SELECT * FROM Commande WHERE User_id = ? ORDER BY id DESC");
        $result->execute([$userId]);
        $commande = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $commande;
    }
    
    // getProductByCommandeId and by userId
    public function getProductByCommandeId($commandeId)
    {
        $result = $this->getDb()->prepare("SELECT * FROM Commande_product LEFT JOIN Product ON Commande_product.Product_id=Product.id JOIN Commande ON Commande_product.Commande_id=Commande.id WHERE  Commande_product.Commande_id = ?");
        $result->execute(array($commandeId));
        $commande = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $commande;
    }
    
    // getProductCommande bay sellerId uniquement pour le backOfice
    public function getProductCommandeBySellerId($sellerId, $commandeId)
    {
        $result = $this->getDb()->prepare("SELECT * FROM Commande_product LEFT JOIN Product ON Commande_product.Product_id=Product.id WHERE  Product.User_id = ? AND Commande_product.Commande_id = ?");
        $result->execute([$sellerId, $commandeId]);
        $commande = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $commande;
    }
    
    // getOneProductByCommandeBySellerId
    public function getOneProductByCommandeBySellerId($sellerId, $productId)
    {
        $result = $this->getDb()->prepare("SELECT * FROM Commande_product LEFT JOIN Product ON Commande_product.Product_id=Product.id WHERE  Product.User_id = ? AND Commande_product.Product_id = ?");
        $result->execute([$sellerId, $productId]);
        $commande = $result->fetch(\PDO::FETCH_ASSOC);
        return $commande;
    }
    
    // getCommandeByStatusForSeller
    public function getCommandeByStatusForSeller($sellerId, $status)
    {
        $result = $this->getDb()->prepare("SELECT * FROM Commande_product LEFT JOIN Product ON Commande_product.Product_id=Product.id JOIN Commande ON Commande_product.Commande_id=Commande.id WHERE  Product.User_id = ? AND Commande.status = ?");
        $result->execute([$sellerId, $status]);
        $commande = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $commande;
    }
    
    // Create Commande
    public function flushCommande()
    {
        $result = $this->getDb()->prepare("INSERT INTO Commande (User_id, createdAt, chipedAt, status, montant, adresse) VALUES (:userId, :createdAt, :chipedAt, :status, :montant, :adresse)");
        $result->execute([
            'userId' => $this->userId,
            'createdAt' => $this->createdAt,
            'chipedAt' => $this->chipedAt,
            'status' => $this->status,
            'montant' => $this->montant,
            'adresse' => $this->adresse
        ]);; 
    }
    
    // update Commande
    
    public function updateCommande($commandeId, $chipedAt, $status)
    {
        if($status === 'Livré'){
            $chipedAt = new \DateTime();
            $chipedAt = $chipedAt->format('Y-m-d H:i:s');
        }else{
            $chipedAt = null;
        }
        
        $result = $this->getDb()->prepare("UPDATE commande SET chipedAt = :chipedAt, status = :status, WHERE id = :commandeId");
        $result->execute([
            'chipedAt' => $chipedAt,
            'status' => $status,
            'commandeId' => $commandeId
        ]);
        return $result;
    }
    
    // le id de la dernière commande créée
    public function getLastCommandeId($userId)
    {
        $result = $this->getDb()->prepare("SELECT * FROM Commande WHERE User_id = ? ORDER BY id DESC LIMIT 1");
        $result->execute([$userId]);
        $commande = $result->fetch();
        return $commande;
    }
    
    // getCommandeByStatus uniquement pour le backoffice
    public function getCommandeByStatus($status)
    {
        $result = $this->getDb()->prepare("SELECT * FROM Commande WHERE status = ?");
        $result->execute([$status]);
        $commande = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $commande;
    }
    
    // Confirmer les produits dans produit_commande
    public function confirmerProduit($commandeId, $productId, $quantity, $userId)
    {
        $this->product->sellProduct($quantity, $productId, $userId);
        
        $result = $this->getDb()->prepare("UPDATE Commande_product SET status = 'En attente' WHERE Commande_id = ? AND Product_id = ?");
        $result->execute([$commandeId, $productId]);
        return $result;
    }
    
    // UpdateCommandeStatus
    public function updateCommandeStatus($commandeId, $status)
    {
        $result = $this->getDb()->prepare("UPDATE Commande SET status = ? WHERE id = ?");
        $result->execute([$status, $commandeId]);
        return $result;
    }
    
    // traiterCommande
    public function traiterCommande($commandeId)
    {
        $result = $this->getDb()->prepare("UPDATE Commande SET status = 'En cours' WHERE id = ?");
        $result->execute([$commandeId]);
        return $result;
    }
    
    // getUserCommandeByStatus pour le front
    public function getUserCommandeByStatus($userId, $status)
    {
        $result = $this->getDb()->prepare("SELECT * FROM Commande WHERE User_id = ? AND status = ?");
        $result->execute([$userId, $status]);
        $commande = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $commande;
    }
    
    // Create product in Commande
    public function flushCommandeProduct()
    {
        $result = $this->getDb()->prepare("INSERT INTO Commande_product (commande_id, product_id, quantity, priceU, priceT, etat) VALUES (:commandeId, :productId, :quantity, :priceU, :priceT, :etat)");
        $result->execute([
            'commandeId' => $this->commandeId,
            'productId' => $this->productId,
            'quantity' => $this->quantity,
            'priceU' => $this->priceU,
            'priceT' => $this->priceT,
            'etat' => $this->etat
        ]);
        return $result;
    }

}