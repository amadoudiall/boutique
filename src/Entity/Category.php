<?php
namespace App\Entity;
use App\Bdd\Bdd;
class Category
{
    //Nom de la categorie
    public string $nom;
    //Description de la categorie
    public string $description;

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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDb()
    {
        $bdd = new Bdd();
        $this->database = $bdd->connect();
        return $this->database;
    }

    public function getCategorys()
    {
        $users = $this->getDb()->query('SELECT * FROM Category');
        return $users->fetchAll();
    }
}
