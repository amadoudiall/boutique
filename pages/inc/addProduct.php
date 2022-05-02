<?php

$title = "Ajouter un produit";
use App\HTML\bootstrapForm;
use App\Entity\Product;
use App\Controller\addProduct;
use App\Entity\Category;

$categorys = new Category();
$addProduct = new addProduct();

$getCategorys = $categorys->getCategorys();


if(isset($_POST['addProduct'])){
    $addProduct->add();
}

if(isset($_GET['url']) and $_GET['url'] === "editProduct"){
    $id = $_GET['id'];
    $submitValue = "Mettre à jour";
    $submitName = "editProduct";
    $getProduct = new Product();
    $product = $getProduct->getProductById($id);
    
    if($_SESSION['user']['id'] != $product['User_id'] and $_SESSION['user']['roles'] != "admin"){
        header('location: /');
    }
    $request = $product;
    
}elseif(isset($_GET['url']) and $_GET['url'] === "addProduct"){
    $request = $_POST;
    $submitValue = "Ajouter";
    $submitName = "addProduct";
}
// if(isset($_POST['click'])){
//     $nom = $_POST['nom'];
//     $description = $_POST['description'];
//     $prixU = $_POST['prixU'];
//     $imageInfo = $_FILES['image'];
//     $image = telechargeImage($imageInfo);
//     $id_boutiquier = $_SESSION['user']['id'];
//     $result = $transaction->createProduct($nom, $description, $prixU, $image, $id_boutiquier);
//     if($result == 1){
//         header('location: listProduit.php');
//     }
    
//     $msg = "Erreur lors de l'ajout du produit";
// }
?>
<div class="container shadow-1 rounded-1 admin admin-addProduct mt-3">
    <div class="addProduct form">

        <?php $form = new bootstrapForm($request);
        $erreur = $addProduct->getErreur();
        if (isset($erreur)) {
            echo $erreur;
        }?>
        <form class="form-material" action="" method="post" enctype="multipart/form-data">
            <?php
                // Product name input
                echo $form->input('text', 'nom', 'Nom du produit');
                
                // Price input
                echo $form->input('number', 'price', 'Prix');
                
                // Categorys select
                echo '<select name="category" class="form-control rounded-1" id="select">';
                echo  '<option>Catégorie...</option>';
                foreach ($getCategorys as $key => $category) {
                    if(isset($product['Category_id']) and $category['id'] === $product['Category_id']){$selected = 'selected';}else{$selected = "";}
                    echo '<option value="'.$category['id'].'"'.$selected.'>'.$category['category'].'</option>';
                }
                echo '</select>';
                // End selecte.
                
                // Image FILE input
                echo $form->inputFile('img', 'Ajouter une image du produit'); 
            ?>
                <!--- If customer can choose color -->
                <div class="form-field toColorise mt-3">
                    <label class="form-check-label" for="toColorise">
                        <input type="checkbox" class="form-check toColorise_input" id="toColorise" name="option[]" value="toColorise">
                        <span>Laisser le clien choisire une couleure</span>
                    </label>
                </div>
                <!--- Each colors -->
                <div class="form-field color_container hidden mt-3">
                    <div class="vueColor">
                        <div class="red" data-value="rouge" title="Rouge" ></div>
                        <div class="blue" data-value="bleu" title="Bleu" ></div>
                        <div class="green" data-value="vert" title="Vert" ></div>
                        <div class="yellow" data-value="jaune" title="Jaune" ></div>
                        <div class="orange" data-value="orange" title="Orange" ></div>
                        <div class="purple" data-value="violet" title="Violet" ></div>
                        <div class="black" data-value="noir" title="Noir" ></div>
                        <div class="white" data-value="blanc" title="Blanc" ></div>
                        <div class="grey" data-value="gris" title="Gris" ></div>
                        <div class="brown" data-value="marron" title="Marron" ></div>
                        <div class="pink" data-value="rose" title="Rose" ></div>
                        <div class="beige" data-value="beige" title="Beige" ></div>
                        <div class="gold" data-value="or" title="Or" ></div>
                        <div class="silver" data-value="argent" title="Argent" ></div>
                        <div class="turquoise" data-value="turquoise" title="Turquoise" ></div>
                    </div>
                    <input type="text" name="color" value="" id="color_input">
                </div>
                
                <!--- If customer can choose size -->
                <div class="form-field mt-3">
                    <label class="form-check-label" for="toSize">
                        <input type="checkbox" class="form-check" id="toSize" name="option[]" value="toSize">
                        <span>Laisser le clien choisire une taille (pour les vetements...)</span>
                    </label>
                </div>
                
                <!--- If customer can choose shoe size -->
                <div class="form-field mt-3">
                    <label class="form-check-label" for="toShoeSize">
                        <input type="checkbox" class="form-check" id="toShoeSize" name="option[]" value="toShoeSize">
                        <span>Laisser le clien choisire une taille (pour les chaussures...)</span>
                    </label>
                </div>
                
                <!--- If customer can choose dimention -->
                <div class="form-field mt-3">
                    <label class="form-check-label" for="toDimention">
                        <input type="checkbox" class="form-check" id="toDimention" name="option[]" value="toDimention">
                        <span>Laisser le clien choisire une dimension (pour les produits mésurés en m ou en cm etc...)</span>
                    </label>
                </div>
                
                
            <?php // Stock_actuel input
                echo $form->input('number', 'stock_actuel', 'Stock Actuel');
                
                // Stock_min input
                echo $form->input('number', 'stock_min', 'Stock min');
                
                // date_expiration input
                echo $form->input('date', 'date_expiration', 'Date d\'expiration');
                
                // Description input
                echo $form->textarea('descr', 'Veuillez décrire au maximum votre produit...');
                // Submit button
                echo $form->submit($submitName, $submitValue);
                
                // End form
            ?>
        </form>
    </div>
</div>
