<?php
namespace App\Controller;

class addProduct{
    public $erreur;
    public $success;

    public function uploadImage($imageInfos){
        $imageName = $imageInfos['name'];
        $imagePath = $imageInfos['tmp_name'];
        $arr = explode('.', $imageName);
        $ext = $arr[count($arr)-1];

        if(move_uploaded_file($imagePath, "../assets/images/".$imageName)){
            return $imageName;
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
            $stocka = htmlspecialchars($_POST['stocka']);
            $stockm = htmlspecialchars($_POST['stockm']);

            $this->uploadImage($image);

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