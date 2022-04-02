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
    public $sessionId;
    public $quantity;
    public $price;
    
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
     * Get the value of sessionId
     */ 
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set the value of sessionId
     *
     * @return  self
     */ 
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }
    
     /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

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
    
    // getProductPanierBySessionId
    public function getProductPanierBySessionId($sessionId)
    {
        $products = $this->getDb()->prepare('SELECT * FROM Panier LEFT JOIN Product ON Product.id = Panier.Product_id WHERE Panier.session_id = ?');
        $products->execute(array($sessionId));
        return $products->fetchAll();
    }
    
    // getProductByUserId
    public function getProductPanierByUserId($userId, $sessionId)
    {
         // get product by userId
        $products = $this->getDb()->prepare('SELECT * FROM Panier LEFT JOIN Product ON Product.id = Panier.Product_id WHERE Panier.User_id = ? OR Panier.session_id = ?');
        $products->execute(array($userId, $sessionId));
        return $products->fetchAll();
    }
    
    // Insert panier
    public function flushPanier()
    {
        $addProduct = $this->getDb()->prepare('INSERT INTO Panier(User_id, Product_id, session_id, quantity, montant) VALUES(:User_id, :Product_id, :session_id, :quantity, :montant)');
        $addProduct->execute([
            'User_id' => $this->userId,
            'Product_id' => $this->productId,
            'session_id' => $this->sessionId,
            'quantity' => $this->quantity,
            'montant' => $this->montant
        ]);
    }
    
    // getUserPanier
    public function getUserProductPanier($userId, $sessionId){
        
           $products = $this->getProductPanierByUserId($userId, $sessionId);
           
        return $products;
    }
    
    public function productExistForUser($sessionId, $userId, $productId){
        
        $products = $this->getDb()->prepare('SELECT * FROM Panier WHERE User_id = ? AND Product_id=? OR session_id = ? AND Product_id = ?');
        $products->execute(array($userId, $productId, $sessionId, $productId));
        
        return $products->fetch();
    }
    
    // Update panier
    public function update($quantity, $productId, $userId, $sessionId, $montant){
        try {
            $this->getDb()->prepare("UPDATE Panier SET quantity = ?, montant = ? WHERE Product_id = ? AND Panier.User_id= ? OR Panier.Product_id = ? AND Panier.session_id = ? ")->execute(array($quantity, $montant, $productId, $userId, $productId, $sessionId));
        } catch (\Throwable $th) {
            echo "La requete ne s'est pas passé comme prévue !". $th;
        }
    }
    
    public function addPanier($productId, $userId, $sessionId, $montant){ 
          
        $getProduct = new Product();
        $product = $getProduct->getProductById($productId);
        
        // Si le produit en question existe
        if ($product != null) {
            $existProduct = $this->productExistForUser($sessionId, $userId, $productId);
            $panier = $this->getProductPanierByUserId($userId, $sessionId);
            // Si le produit ne se trouve pas déjà dans le panier
            if($existProduct == true){
                // si oui on incremente la quantity
                if(!isset($_SESSION['panier']) AND !isset($_SESSION['panier'][$productId]) OR empty($_SESSION['panier'])){
                    $_SESSION['panier'] = array();
                                        
                    foreach ($panier as $key => $product) {
                        $_SESSION['panier'][$product['Product_id']] = ($product['quantity'] + 1);
                    }
                    
                }else{    
                    $_SESSION['panier'][$productId]= ($existProduct['quantity'] + 1);
                }

                
                $montant = ($product['price'] * $_SESSION['panier'][$productId]);
                $quantity = $_SESSION['panier'][$productId];
                
                $this->update($quantity, $productId, $userId, $sessionId, $montant);
                
            }else{
                // sinon on l'ajoute.
                $_SESSION['panier'][$productId] = 1;
                
                $this->setUserId($userId)
                    ->setProductId($productId)
                    ->setSessionId($sessionId)
                    ->setQuantity(1)
                    ->setMontant($product['price']);
                $this->flushPanier();
            }
        }else{
            echo "Desolé ce produit n'est plus disponible !";
        }
    }
    
    public function total($products){
        $total = 0;
        
        foreach ($products as $key => $product) {
            $total += $product['montant'];
        }
        return $total;
    }
    
    public function isCnnected($userId, $sessionId){
        if(isset($_SESSION['sessionId']) and !empty($_SESSION['sessionId'])){
            if(isset($_SESSION['user']) and !empty($_SESSION['user'])){
                $user_product_panier = $this->getProductPanierBySessionId($sessionId);
                foreach ($user_product_panier as $key => $product) {
                    
                    if($product['user_id'] == null and $_SESSION['sessionId'] == $product['session_id']){
                        
                        try {
                            $this->getDb()->prepare("UPDATE Panier SET user_id = ? WHERE session_id = ? ")->execute(array($userId, $sessionId));
                        } catch (\Throwable $th) {
                            echo "La requete ne s'est pas passé comme prévue au moment de la connexion !". $th;
                        }
                    }
                }
            }
        }
    }
    
    public function dellete($productId, $userId, $sessionId){
        unset($_SESSION['panier'][$productId]);
        
        try {
            $this->getDb()->prepare("DELETE FROM Panier WHERE Product_id=? AND user_id=? OR Product_id=? AND session_id = ? ")->execute(array($productId, $userId, $productId, $sessionId));
        } catch (\Throwable $th) {
            echo "La requete ne s'est pas passé comme prévue !". $th;
        }    
        
    }
    
    public function dellAll($sessionId, $userId){
        unset($_SESSION['panier']);
        
        try {
            $this->getDb()->prepare("DELETE FROM Panier WHERE user_id= ? OR session_id= ? ")->execute(array($userId, $sessionId));
        } catch (\Throwable $th) {
            echo "La requete ne s'est pas passé comme prévue !". $th;
        }    
    }
    
}