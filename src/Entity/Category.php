<?php
namespace App\Entity;
use App\Bdd\Bdd;
class Category
{
    //Nom de la categorie
    public string $category;
    //Description de la categorie
    public string $description;
    
    // Icon de la categorie
    public string $icon;

    /**
     * Get the value of nom
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

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
    
    // Getter and Setter for icon
    // Getter for icon
    public function getIcon()
    {
        return $this->icon;
    }
    // Setter for icon
    public function setIcon($icon)
    {
        $this->icon = $icon;
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

    public function flushCategory()
    {
        $addUser = $this->getDb()->prepare('INSERT INTO Category(category, descriptions, icon) VALUES(:category, :descriptions, :icon)');
        $addUser->execute([
            'category' => $this->category,
            'descriptions' => $this->description,
            'icon' => $this->icon
        ]);
    }
}
