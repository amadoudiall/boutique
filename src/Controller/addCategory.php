<?php
namespace App\Controller;
use App\Entity\Category;
class addCategory{
    public $erreur;
    public $success;

    public function add(){
        if(isset($_POST['nom']) and !empty($_POST['nom'])
            and isset($_POST['desc']) and !empty($_POST['desc'])){
            $nom = htmlspecialchars($_POST['nom']);
            $desc = htmlspecialchars($_POST['desc']);

            $category = new Category();

            $category->setCategory($nom)
                    ->setDescription($desc);
            $category->flushCategory();

        }else{
            $this->setErreur('Tout les champs sont obligatoire !');
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