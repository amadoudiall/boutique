<?php
namespace App\Controller;
use App\Entity\Product;
class addProduct{
    public $erreur;
    public $success;

    function cha($longueur = 10)
        {
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $longueurMax = strlen($caracteres);
            $chaineAleatoire = '';
            for ($i = 0; $i < $longueur; $i++)
            {
                $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
            }
                return $chaineAleatoire;
        }

    public function uploadImage($imageInfos){
        $imageName = $imageInfos['name'];
        $imagePath = $imageInfos['tmp_name'];

        // Un nom unique pour chaque image
        $imageDefaultName = $this->cha(15);
        $imageDefaultName .= $imageName;

        if(move_uploaded_file($imagePath, "../assets/images/Product/".$imageDefaultName)){
            return $imageDefaultName;
        }
        return "";
    }

    public function add(){

        if(isset($_POST['nom']) and !empty($_POST['nom']) and isset($_POST['price']) and !empty($_POST['price'])
            and isset($_POST['category']) and !empty($_POST['category']) and isset($_FILES['img']) and !empty($_FILES['img'])
            and isset($_POST['stocka']) and !empty($_POST['stocka']) and isset($_POST['stockm']) and !empty($_POST['stockm'])
            and isset($_POST['desc']) and !empty($_POST['desc'])
        ){
            $nom = htmlspecialchars($_POST['nom']);
            $price = htmlspecialchars($_POST['price']);
            $category = htmlspecialchars($_POST['category']);
            $image = $_FILES['img'];
            $desc = htmlspecialchars($_POST['desc']);
            $stocka = htmlspecialchars($_POST['stocka']);
            $stockm = htmlspecialchars($_POST['stockm']);
            $expiration = '2000-01-01';

            if(isset($_POST['expiration']) and !empty($_POST['expiration'])){
                $expiration = $_POST['expiration'];
            }

            $imageName = $this->uploadImage($image);

            $product = new Product();
            $user = $_SESSION['user']['id'];

            $now = new \Datetime;
            $createdAt = $now->format('Y-m-d H:i:s');
            $updatedAt = $now->format('Y-m-d H:i:s');

            $product->setNom($nom)
                    ->setPrice($price)
                    ->setCategory($category)
                    ->setImg($imageName)
                    ->setDesc($desc)
                    ->setStock_actuel($stocka)
                    ->setStock_min($stockm)
                    ->setDate_expiration($expiration)
                    ->setIs_promo(0)
                    ->setPromo(0)
                    ->setUpdatedAt($updatedAt)
                    ->setCreatedAt($createdAt)
                    ->setUser($user);
            $product->flushProduct();

            $this->setSuccess('Tout c\'est bien passée !');
        }else{
            $this->setErreur('Tout les champs sonts obligatoire !');
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