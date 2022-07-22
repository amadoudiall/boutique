<?php

namespace App\Entity;

use \App\Bdd\Bdd;
use \App\Entity\User;
use \App\Entity\Category;

class Product
{
    public string $nom;
    public float $price_by;
    public float $price;
    public float $price_sell;
    public string $category;
    public string $img;
    public string $desc;
    public int $stock_actuel;
    public int $stock_min;
    public string $date_expiration;
    public int $is_promo;
    public int $promo;
    public string $updatedAt;
    public string $createdAt;
    public string $user;
    public int $ventes;
    public int $is_active;
    public string $color;
    public string $size;
    public string $pointure;
    public string $dimensions;

    //se suffix permet d'afficher la devise devant le prix a l'affichage
    const SUFFIX_DEVISE = " FCFA";
    const SUFFIX_LOT = "";
    const SUFFIX_CODE = "";

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

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
     * Get the value of price_by
     */ 
    public function getPrice_by()
    {
        return $this->price_by;
    }

    /**
     * Set the value of price_by
     *
     * @return  self
     */ 
    public function setPrice_by($price_by)
    {
        $this->price_by = $price_by;

        return $this;
    }

    /**
     * Get the value of price_sell
     */ 
    public function getPrice_sell()
    {
        return $this->price_sell;
    }
    
    /**
     * Set the value of price_sell
     *
     * @return  self
     */ 
    public function setPrice_sell($price_sell)
    {
        $this->price_sell = $price_sell;
        
        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of desc
     */ 
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     *
     * @return  self
     */ 
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get the value of stock_actuel
     */ 
    public function getStock_actuel()
    {
        return $this->stock_actuel;
    }

    /**
     * Set the value of stock_actuel
     *
     * @return  self
     */ 
    public function setStock_actuel($stock_actuel)
    {
        $this->stock_actuel = $stock_actuel;

        return $this;
    }

    /**
     * Get the value of stock_min
     */ 
    public function getStock_min()
    {
        return $this->stock_min;
    }

    /**
     * Set the value of stock_min
     *
     * @return  self
     */ 
    public function setStock_min($stock_min)
    {
        $this->stock_min = $stock_min;

        return $this;
    }

    /**
     * Get the value of date_expiration
     */ 
    public function getDate_expiration()
    {
        return $this->date_expiration;
    }

    /**
     * Set the value of date_expiration
     *
     * @return  self
     */ 
    public function setDate_expiration($date_expiration)
    {
        $this->date_expiration = $date_expiration;

        return $this;
    }

    /**
     * Get the value of is_promo
     */ 
    public function getIs_promo()
    {
        return $this->is_promo;
    }

    /**
     * Set the value of is_promo
     *
     * @return  self
     */ 
    public function setIs_promo($is_promo)
    {
        $this->is_promo = $is_promo;

        return $this;
    }

    /**
     * Get the value of promo
     */ 
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Set the value of promo
     *
     * @return  self
     */ 
    public function setPromo($promo)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

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
     * Get the value of color
     */
    public function getColor(){
        return $this->color;
    }
    
    /**
     * Set the value of color
     * @return  self
     */
    public function setColor($color){
        $this->color = $color;
        return $this;
    }
    
    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }
    
    /**
     * Get the value of pointure
     */ 
    public function getPointure()
    {
        return $this->pointure;
    }

    /**
     * Set the value of pointure
     *
     * @return  self
     */ 
    public function setPointure($pointure)
    {
        $this->pointure = $pointure;

        return $this;
    }

    /**
     * Get the value of dimensions
     */ 
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * Set the value of dimensions
     *
     * @return  self
     */ 
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
    
    /**
     * Get the value of ventes
     */ 
    public function getVentes()
    {
        return $this->ventes;
    }

    /**
     * Set the value of ventes
     *
     * @return  self
     */ 
    public function setVentes($ventes)
    {
        $this->ventes = $ventes;

        return $this;
    }

    /**
     * Get the value of is_active
     */ 
    public function getIs_active()
    {
        return $this->is_active;
    }

    /**
     * Set the value of is_active
     *
     * @return  self
     */ 
    public function setIs_active($is_active)
    {
        $this->is_active = $is_active;

        return $this;
    }

    // Recuperer la base de données
    public function getDb()
    {
        $bdd = new Bdd();
        $this->database = $bdd->connect();
        return $this->database;
    }
    
    public static function getProducts()
    {
        $connect = new Bdd();
        $bddcontent = 'SELECT *, Product.id as idProduct FROM Product LEFT JOIN Category ON Category.id = Product.Category_id';
        $bddstatement = $connect->connect()->prepare($bddcontent);
        $bddstatement->execute();
        $products = $bddstatement->fetchAll();
        return $products;
    }

    public static function getProductById($id)
    {
        $connect = new Bdd();
        $bddcontent = 'SELECT *, Product.id as idProduct FROM Product JOIN Category ON Category.id = Product.Category_id WHERE Product.id = ?';
        $bddstatement = $connect->connect()->prepare($bddcontent);
        $bddstatement->execute(array($id));
        $products = $bddstatement->fetch();
        return $products;
    }

    // update Stock_actuel
    public function updateStockActuel($productId, $stock_actuel, $userId)
    {
        $connect = new Bdd();
        $bddcontent = 'UPDATE Product SET stock_actuel = ? WHERE id = ? AND User_id = ?';
        $bddstatement = $connect->connect()->prepare($bddcontent);
        $bddstatement->execute(array($stock_actuel, $productId, $userId));
    }

    // update Ventes
    public function updateVentes($productId, $ventes, $userId)
    {
        $connect = new Bdd();
        $bddcontent = 'UPDATE Product SET ventes = ? WHERE id = ? AND User_id = ?';
        $bddstatement = $connect->connect()->prepare($bddcontent);
        $bddstatement->execute(array($ventes, $productId, $userId));
    }
    
    // update Product quantity
    public function sellProduct($stock_actuel, $productId, $userId, $ventes)
    {
        $this->updateStockActuel($productId, $stock_actuel, $userId);
        $this->updateVentes($productId, $ventes, $userId);
    }

    public function flushProduct()
    {
        try {
            $addUser = $this->getDb()->prepare('INSERT INTO Product(nom, price_by, price, price_sell, Category_id, img, descr, stock_actuel, stock_min, date_expiration, promo, updated_at, created_at, color, size, pointure, dimensions, User_id, ventes, is_active) VALUES(:nom, :price_by, :price, :price_sell, :Category_id, :img, :descr, :stock_actuel, :stock_min, :date_expiration, :promo, :updated_at, :created_at, :color, :size, :pointure, :dimensions, :User_id, :ventes, :is_active)');
            $addUser->execute([
                'nom' => $this->nom,
                'price_by' => $this->price_by,
                'price' => $this->price,
                'price_sell' => $this->price_sell,
                'Category_id' => $this->category,
                'img' => $this->img,
                'descr' => $this->desc,
                'stock_actuel' => $this->stock_actuel,
                'stock_min' => $this->stock_min,
                'date_expiration' => $this->date_expiration,
                'promo' => $this->promo,
                'updated_at' => $this->updatedAt,
                'created_at' => $this->createdAt,
                'color' => $this->color,
                'size' => $this->size,
                'pointure' => $this->pointure,
                'dimensions' => $this->dimensions,
                'User_id' => $this->user,
                'ventes' => $this->ventes,
                'is_active' => $this->is_active
            ]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            die('Erreur lors de l\'ajout d\'un produit');
        }       
    }
    
    // getProductBySellerId
    
    public function getProductBySellerId($id)
    {
        $connect = new Bdd();
        $bddcontent = 'SELECT *, Product.id as idProduct FROM Product LEFT JOIN Category ON Category.id = Product.Category_id WHERE User_id = ?';
        $bddstatement = $connect->connect()->prepare($bddcontent);
        $bddstatement->execute(array($id));
        $products = $bddstatement->fetchAll();
        return $products;
    }
    
    // Edit product
    public function editProduct($id)
    {
        try {
            $editProduct = $this->getDb()->prepare('UPDATE Product SET nom = :nom, price_by = :price_by, price = :price, price_sell = :price_sell, Category_id = :Category_id, img = :img, descr = :descr, stock_actuel = :stock_actuel, stock_min = :stock_min, date_expiration = :date_expiration, promo = :promo, updated_at = :updated_at, color = :color, size = :size, pointure = :pointure, dimensions = :dimensions WHERE id = :id');
            $editProduct->execute([
                'nom' => $this->nom,
                'price_by' => $this->price_by,
                'price' => $this->price,
                'price_sell' => $this->price_sell,
                'Category_id' => $this->category,
                'img' => $this->img,
                'descr' => $this->desc,
                'stock_actuel' => $this->stock_actuel,
                'stock_min' => $this->stock_min,
                'date_expiration' => $this->date_expiration,
                'promo' => $this->promo,
                'updated_at' => $this->updatedAt,
                'color' => $this->color,
                'size' => $this->size,
                'pointure' => $this->pointure,
                'dimensions' => $this->dimensions,
                'id' => $id
            ]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            die('Erreur lors de la modification d\'un produit');
        }
    }
    
    // delete Product
    public function deleteProduct($id)
    {
        $connect = new Bdd();
        $bddstatement = $connect->connect()->prepare('DELETE FROM Product WHERE id = ?');
        $bddstatement->execute(array($id));
    }
    
    // Get Comments
    public function getComments($id){
        $connect = new Bdd();
        $bddstatement = $connect->connect()->prepare('SELECT * FROM Product_comment WHERE Product_id = ?');
        $bddstatement->execute(array($id));
        $comments = $bddstatement->fetchAll();
    }
    
    // Avoir la moyenne des notes
    public function getAverageNote($id){
        $connect = new Bdd();
        $bddstatement = $connect->connect()->prepare('SELECT AVG(rating) FROM Product_comment WHERE Product_id = ?');
        $bddstatement->execute(array($id));
        $average = $bddstatement->fetch();
        return $average;
    }
    
    // Activer un produit
    public function activeProduct($id){
        $connect = new Bdd();
        $bddstatement = $connect->connect()->prepare('UPDATE Product SET is_active = 1 WHERE id = ?');
        $bddstatement->execute(array($id));
    }
    
    // Desactiver un produit
    public function desactiveProduct($id){
        $connect = new Bdd();
        $bddstatement = $connect->connect()->prepare('UPDATE Product SET is_active = 0 WHERE id = ?');
        $bddstatement->execute(array($id));
    }
}
