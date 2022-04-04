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
    
    if($_SESSION['user']['id'] != $product['User_id']){
        header('location: /');
    }
    $request = $product;
    
}elseif(isset($_GET['url']) and $_GET['url'] === "addProduct"){
    $request = $_POST;
    $submitValue = "Ajouter";
    $submitName = "addProduct";
}
?>
<div class="container admin admin-addProduct mt-3">
    <div class="addProduct form">

        <?php $form = new bootstrapForm($request);
        $erreur = $addProduct->getErreur();
        if (isset($erreur)) {
            echo $erreur;
        }?>
        <form class="form-material" action="" method="post" enctype="multipart/form-data">
            <?php
                echo $form->input('text', 'nom', 'Nom du produit');
                echo $form->input('number', 'price', 'Prix');
                // Selecte pour gèrer les catégories
                echo '<select name="category" class="form-control rounded-1" id="select">';
                echo  '<option>Catégorie...</option>';
                foreach ($getCategorys as $key => $category) {
                    if(isset($product['Category_id']) and $category['id'] === $product['Category_id']){$selected = 'selected';}else{$selected = "";}
                    echo '<option value="'.$category['id'].'"'.$selected.'>'.$category['category'].'</option>';
                }
                echo '</select>';
                // Fin du selecte.
                echo $form->inputFile('img', 'Ajouter une image du produit');
                echo $form->input('number', 'stock_actuel', 'Stock Actuel');
                echo $form->input('number', 'stock_min', 'Stock min');
                echo $form->input('date', 'date_expiration', 'Date d\'expiration');
                echo $form->textarea('descr', 'Veuillez décrire au maximum votre produit...');
                echo $form->submit($submitName, $submitValue);
            ?>
        </form>
    </div>
</div>
