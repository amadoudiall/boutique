<?php
namespace App\Controller;
use App\Entity\Panier;
use App\Entity\Commande;
use App\Entity\Commande_product;
use App\Entity\Product;

class addCommande{
    public $erreur;
    public $success;
    
    // Ajouter une commande
    public function add(){
        if(!empty($_SESSION['panier'])){
            
            if(!empty($_SESSION['user'])){
                $userId = $_SESSION['user']['id'];
                 
                $createdAt = new \DateTime();
                $createdAt = $createdAt->format('Y-m-d H:i:s');
                $chipedAt = null;
                $panier = new Panier();
                $commande = new Commande();
            
                $products = $panier->getProductPanierByUserId($userId, $_SESSION['sessionId']);
                $commande->setUserId($userId);
                $commande->setCreatedAt($createdAt);
                $commande->setChipedAt($chipedAt);
                $commande->setStatus('En attente');
                $commande->setMontant($panier->total($products));
                $commande->setAdresse($_SESSION['user']['adresse']);
                $commande->flushCommande();
                                
                // lastInsertId() retourne l'id de la dernière commande insérée
                $lasteCommandeId = $commande->getLastCommandeId($userId);
                foreach($products as $product){
                    $commande->setCommandeId($lasteCommandeId['id']);
                    $commande->setProductId($product['id']);
                    $commande->setQuantity($product['quantity']);
                    $commande->setDetails($product['detaille_options']);
                    $commande->setPriceU($product['price']);
                    $commande->setPriceT($product['price'] * $product['quantity']);
                    $commande->setEtat('En attente');
                    
                    $commande->flushCommandeProduct();
                }
            
                unset($_SESSION['panier']);
                $panier->dellAll($_SESSION['sessionId'], $userId);
                $this->setSuccess('Votre commande a été enregistrée !');
            }else{
                header('location: ../pages/connexion.php?error=Vous devez être connecté pour valider votre commande');
            }
            
        }
    }
    
    // confirmer un produit
    public function confirmerProduit($commandeId, $productId){
        $userId = $_SESSION['user']['id'];
        $commande = new Commande();
        $getProduct = new Product();
        $product = $getProduct->getProductById($productId);
        $productCommande = $commande->getOneProductByCommandeBySellerId($userId, $productId);
        
        if($product['is_active'] === '1' AND $product['quantity'] > $productCommande['quantity']){
            
            $quantity = ($product['quantity'] - $productCommande['quantity']);
            $commande->confirmerProduit($commandeId, $productId, $quantity, $userId);
            $this->setSuccess('Vous avez validé le produit '.$product['nom'].' !');
        }else{
            $this->setErreur('Le produit n\'est plus disponible');
        }
    }

    /**
     * Get the value of erreur
     */ 
    public function getErreur()
    {
        return $this->erreur;
    }

    /**
     * Set the value of erreur
     *
     * @return  self
     */ 
    public function setErreur($erreur)
    {
        $this->erreur = $erreur;

        return $this;
    }

    /**
     * Get the value of success
     */ 
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Set the value of success
     *
     * @return  self
     */ 
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }
}