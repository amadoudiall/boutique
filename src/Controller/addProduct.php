<?php
namespace App\Controller;
use App\Entity\Product;
class addProduct{
    public $erreur;
    public $success;
    
    // Calculer le prix de vente a l'application de promotion
    public function calculerPrix($prix, $promo){
        if($promo == 0){
            return $prix;
        }
        else{
            $diff = (100 - $promo);
            return $prix = ($prix / 100) * $diff;
        }
    }
    
    // Calculer la commision a prelever sur le prix de vente
    public function calculerCommission($prixVente, $prixAchat){
        $benef = ($prixVente - $prixAchat);
        return $commission = ($benef / 100) * 10;
    }

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
    // Add Product
    public function add(){
        
        // pour la redirection
        if($_SESSION['user']['roles'] == 'admin' OR $_SESSION['user']['roles'] == 'boutiquier'){
            $lien = '../pages/admin.php';
        }else{
            $lien = '../pages/profile.php';
        }

        if(isset($_POST['nom']) and !empty($_POST['nom']) and isset($_POST['price']) and !empty($_POST['price'])
            and isset($_POST['category']) and !empty($_POST['category']) and isset($_FILES['img']) and !empty($_FILES['img'])
            and isset($_POST['stock_actuel']) and !empty($_POST['stock_actuel']) and isset($_POST['stock_min']) and !empty($_POST['stock_min'])
            and isset($_POST['descr']) and !empty($_POST['descr']) and isset($_POST['price']) and !empty($_POST['price_by'])
        ){
            $nom = htmlspecialchars($_POST['nom']);
            $price_by = htmlspecialchars($_POST['price_by']);
            $price = htmlspecialchars($_POST['price']);
            $category = htmlspecialchars($_POST['category']);
            $image = $_FILES['img'];
            $desc = htmlspecialchars($_POST['descr']);
            $stocka = htmlspecialchars($_POST['stock_actuel']);
            $stockm = htmlspecialchars($_POST['stock_min']);

            if(isset($_POST['date_expiration']) and !empty($_POST['date_expiration'])){
                $expiration = $_POST['date_expiration'];
            }else{
                $expiration = '1970-01-01';
            }
            
            // if color is set
            if(isset($_POST['color']) and !empty($_POST['color'])){
                $color = htmlspecialchars($_POST['color']);
            }else{
                $color = 'auccun';
            }
            
            // if size is set
            if(isset($_POST['size']) and !empty($_POST['size'])){
                $size = htmlspecialchars($_POST['size']);
            }else{
                $size = 'auccun';
            }
            
            // if Shoe Size is set
            if(isset($_POST['shoeSize']) and !empty($_POST['shoeSize'])){
                $shoe_size = htmlspecialchars($_POST['shoeSize']);
            }else{
                $shoe_size = 'auccun';
            }
            
            // if Dimensions is set
            // Dimensions
            if(isset($_POST['dimention_width']) and !empty($_POST['dimention_width'])){
                // Width
                $width = 'Longeur: '.htmlspecialchars($_POST['dimention_width']);
                $width .= ' '. htmlspecialchars($_POST['dimention_width_unit']);
                // Depth
                $depth = 'Largeur: '.htmlspecialchars($_POST['dimention_depth']);
                $depth .= ' '. htmlspecialchars($_POST['dimention_depth_unit']);
                // Height
                $height = 'Hauteur: '.htmlspecialchars($_POST['dimention_height']);
                $height .= ' '.htmlspecialchars($_POST['dimention_height_unit']);
                $dimensions = $width.', '.$depth.', '.$height;
            }else{
                $dimensions = 'auccun';
            }
            
            // if Promotion is set
            if(isset($_POST['promo']) and !empty($_POST['promo'])){
                $promo = htmlspecialchars($_POST['promo']);
            }else{
                $promo = '0';
            }

            $imageName = $this->uploadImage($image);

            $product = new Product();
            $user = $_SESSION['user']['id'];

            $now = new \Datetime;
            $createdAt = $now->format('Y-m-d H:i:s');
            $updatedAt = $now->format('Y-m-d H:i:s');
            // Verifier si le prix d'achat est inferieur au prix de vente
            if($price_by < $price){
                    $product->setNom($nom)
                        ->setPrice_by($price_by)
                        ->setPrice($price)
                        ->setPrice_sell($price)
                        ->setCategory($category)
                        ->setImg($imageName)
                        ->setDesc($desc)
                        ->setStock_actuel($stocka)
                        ->setStock_min($stockm)
                        ->setDate_expiration($expiration)
                        ->setPromo($promo)
                        ->setUpdatedAt($updatedAt)
                        ->setCreatedAt($createdAt)
                        ->setColor($color)
                        ->setSize($size)
                        ->setPointure($shoe_size)
                        ->setDimensions($dimensions)
                        ->setUser($user)
                        ->setVentes(0)
                        ->setIs_active(0);
                $product->flushProduct();
                $this->setSuccess('Tout c\'est bien passée !');
                header('location: '.$lien.'?url=product');
            }else{
                $this->setErreur('Le prix de vente doit être supérieur au prix d\'achat');
            }
        }else{
            $this->setErreur('Tout les champs sonts obligatoire !');
        }
        
        
    }
    
    // Edit product
    public function edit(){
        // pour la redirection
        if($_SESSION['user']['roles'] == 'admin' OR $_SESSION['user']['roles'] == 'boutiquier'){
            $lien = '../pages/admin.php';
        }else{
            $lien = '../pages/profile.php';
        }
        
        $product = new Product();
        $thisProduct = $product->getProductById($_POST['Pid']);
        // Nom
        if(isset($_POST['nom']) and !empty($_POST['nom'])){
            $nom = htmlspecialchars($_POST['nom']);
            $product->setNom($nom);
        }
        
        // Price_by
        if(isset($_POST['price_by']) and !empty($_POST['price_by'])){
            $price_by = htmlspecialchars($_POST['price_by']);
            $product->setPrice_by($price_by);
        }
        
        // Prix
        if(isset($_POST['price']) and !empty($_POST['price'])){
            $price = htmlspecialchars($_POST['price']);
            $product->setPrice($price);
        }
        
        // Price_sell
        if(isset($_POST['price_sell']) and !empty($_POST['price_sell'])){
            $price_sell = htmlspecialchars($_POST['price_sell']);
            $product->setPrice_sell($price_sell);
        }else{
            if($thisProduct['price_sell'] == null OR $thisProduct['price_sell'] == 0){
                $product->setPrice_sell('0');
            }else{
                $product->setPrice_sell($thisProduct['price_sell']);
            }
        }
        
        // Category
        if(isset($_POST['category']) and !empty($_POST['category'])){
            $category = htmlspecialchars($_POST['category']);
            $product->setCategory($category);
        }
        
        // Image
        if(isset($_FILES['img']) and !empty($_FILES['img'])){
            $image = $_FILES['img'];
            $imageName = $this->uploadImage($image);
            // if $image is not empty
            if($imageName == ""){
                $imageName = $thisProduct['img'];
            }else{
                unlink('../assets/images/Product/'.$thisProduct['img']);
            }
            $product->setImg($imageName);
            
        }else{
            $imageName = $thisProduct['img'];
            $product->setImg($imageName);
        }
        
        // Description
        if(isset($_POST['descr']) and !empty($_POST['descr'])){
            $desc = htmlspecialchars($_POST['descr']);
            $product->setDesc($desc);
        }
        
        // Stock actuel
        if(isset($_POST['stock_actuel']) and !empty($_POST['stock_actuel'])){
            $stocka = htmlspecialchars($_POST['stock_actuel']);
            $product->setStock_actuel($stocka);
        }
        
        // Stock minimum
        if(isset($_POST['stock_min']) and !empty($_POST['stock_min'])){
            $stockm = htmlspecialchars($_POST['stock_min']);
            $product->setStock_min($stockm);
        }
        
        // Date expiration
        if(isset($_POST['date_expiration']) and !empty($_POST['date_expiration'])){
            $expiration = $_POST['date_expiration'];
            $product->setDate_expiration($expiration);
        }
        
        // Promo
        if(isset($_POST['promo']) and !empty($_POST['promo'])){
            $promo = htmlspecialchars($_POST['promo']);
            $product->setPromo($promo);
            $price_sell = $this->calculerPrix($thisProduct['price'],$promo);
            $product->setPrice_sell($price_sell);
        }else{
            $product->setPromo(0);
        }
        
        // updatedAt
        $now = new \Datetime;
        $updatedAt = $now->format('Y-m-d H:i:s');
        $product->setUpdatedAt($updatedAt);
        
        // Color
        if(isset($_POST['color']) and !empty($_POST['color'])){
            $color = htmlspecialchars($_POST['color']);
            $product->setColor($color);
        }else{
            if($thisProduct['color'] != null){
                $product->setColor($thisProduct['color']);
            }else{
                $product->setColor('auccun');
            }
        }
        
        // Size
        if(isset($_POST['size']) and !empty($_POST['size'])){
            $size = htmlspecialchars($_POST['size']);
            $product->setSize($size);
        }else{
            if($thisProduct['size'] != null){
                $product->setSize($thisProduct['size']);
            }else{
                $product->setSize('auccun');
            }
        }
        
        // Shoe Size
        if(isset($_POST['shoeSize']) and !empty($_POST['shoeSize'])){
            $shoe_size = htmlspecialchars($_POST['shoeSize']);
            $product->setPointure($shoe_size);
        }else{
            if($thisProduct['shoe_size'] != null){
                $product->setPointure($thisProduct['shoe_size']);
            }else{
                $product->setPointure('auccun');
            }
        }
        
        // Dimensions
        if(isset($_POST['dimention_width']) and !empty($_POST['dimention_width'])){
            // Width
            $width = 'Longeur: '.htmlspecialchars($_POST['dimention_width']);
            $width .= ' '. htmlspecialchars($_POST['dimention_width_unit']);
            // Depth
            $depth = 'Largeur: '.htmlspecialchars($_POST['dimention_depth']);
            $depth .= ' '. htmlspecialchars($_POST['dimention_depth_unit']);
            // Height
            $height = 'Hauteur: '.htmlspecialchars($_POST['dimention_height']);
            $height .= ' '.htmlspecialchars($_POST['dimention_height_unit']);
            $dimensions = $width.', '.$depth.', '.$height;
            $product->setDimensions($dimensions);
        }else{
            if($thisProduct['dimensions'] != null){
                $product->setDimensions($thisProduct['dimensions']);
            }else{
                $product->setDimensions('auccun');
            }
        }
        
        // Check if this user is the owner of the product
        if($thisProduct['User_id'] == $_SESSION['user']['id']){
            $product->editProduct($_POST['Pid']);
            $this->setSuccess('Tout c\'est bien passée !');
            header('location: '.$lien.'?url=product');
        }else{
            $this->setErreur('Vous n\'avez pas le droit de modifier ce produit !');
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