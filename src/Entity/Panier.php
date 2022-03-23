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
    
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
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
        $products = $this->getDb()->prepare('SELECT * FROM Panier WHERE id= ?');
        $products->execute(array($panierId));
        return $products->fetchAll();
    }
    
    public function flushPanier()
    {
        $addProduct = $this->getDb()->prepare('INSERT INTO Panier(User_id, Product_id, quantity, montant) VALUES(:User_id, :Product_id, :quantity, :montant)');
        $addProduct->execute([
            'User_id' => $this->userId,
            'Product_id' => $this->productId,
            'quantity' => $this->quantity,
            'montant' => $this->montant
        ]);
    }
    
    public function update($quantity, $id){
        try {
            $updatePanier = $this->getDb()->query("UPDATE Panier SET quantity = '".$quantity."' WHERE Product_id = '".$id."'");
        } catch (\Throwable $th) {
            echo "La requete ne s'est pas passé comme prévue !". $th;
        }
    }
    
    public function addPanier($productId, $userId){ 
          
        $getProduct = new Product();
        $product = $getProduct->getProductById($productId);
        
        // Si le produit en question existe
        if ($product != null) {
            
            // Si le produit ne se trouve pas déjà dans le panier
            if(isset($_SESSION['panier'][$productId])){
                // si oui on incremente la quantity
                $_SESSION['panier'][$productId]++;
                $quantity = $_SESSION['panier'][$productId];
                
                $this->update($quantity, $productId);
                
            }else{
                // sinon on l'ajoute.
                $_SESSION['panier'][$productId] = 1;
                
                $this->setUserId($userId)
                    ->setProductId($productId)
                    ->setQuantity(1)
                    ->setMontant($product['price']);
                $this->flushPanier();
            }
        }else{
            echo "Desolé ce produit n'est plus disponible !";
        }
    }
    
    public function dellete($productId){
        unset($_SESSION['panier'][$productId]);
        
        try {
            $updatePanier = $this->getDb()->query("DELETE FROM Panier WHERE Product_id = '".$productId."'");
        } catch (\Throwable $th) {
            echo "La requete ne s'est pas passé comme prévue !". $th;
        }        
    }
    
    
}