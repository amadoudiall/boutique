<?php

namespace App\Entity;

use \App\Bdd\Bdd;
use \App\Entity\User;
use \App\Entity\Category;

class Product
{
    public string $nom;
    public float $price;
    public Category $category;
    public string $img;
    public string $description;
    public int $stock_actuel;
    public int $stock_min;
    public \DateTime $expiration;
    public int $lotNumero;
    public int $code;
    public \DateTime $updatedAt;
    public \DateTime $createdAt;
    public User $user;

    //se suffix permet d'afficher la devise devant le prix a l'affichage
    const SUFFIX_DEVISE = " FCFA";
    const SUFFIX_LOT = "AL00";
    const SUFFIX_CODE = "AA000";

    //construction de la class Product
    public function __construct(
        string $nom,
        float $price,
        Category $category,
        string $image,
        string $description,
        int $stock_actuel,
        int $stock_min,
        \DateTime $expiration,
        int $lotNumero,
        int $code,
        \DateTime $updatedAt,
        \DateTime $createdAt,
        User $user
    ) {
        $this->nom = $nom;
        $this->price = $price;
        $this->category = $category;
        $this->image = $image;
        $this->description = $description;
        $this->stockActu = $stock_actuel;
        $this->stockMin = $stock_min;
        $this->expiration = $expiration;
        $this->lotNumero = $lotNumero;
        $this->code = $code;
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
        $this->user = $user;
    }

    public static function getProduct()
    {
        $connect = new Bdd();
        $bddcontent = 'SELECT * FROM Product LEFT JOIN Category ON Category.id = Product.Category_id';
        $bddstatement = $connect->connect()->prepare($bddcontent);
        $bddstatement->execute();
        $products = $bddstatement->fetchAll();
        return $products;
    }

    public static function getProductById($id)
    {
        $connect = new Bdd();
        $bddcontent = 'SELECT * FROM Product LEFT JOIN Category ON Category.id = Product.Category_id';
        $bddstatement = $connect->connect()->prepare($bddcontent);
        $bddstatement->execute();
        $products = $bddstatement->fetchAll();
        return $products;
    }
}
