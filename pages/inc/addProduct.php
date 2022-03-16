<?php
$title = "Ajouter un produit";
use App\HTML\bootstrapForm;
use App\Entity\Product;
use App\Controller\addProduct;
use App\Entity\Category;

$product = new addProduct();
if(isset($_POST['addProduct'])){
    $product->add();
}
?>
<div class="addProduct maint">
    <div class="form">

        <?php $form = new bootstrapForm($_POST, $_FILES);
                $categorys = new Category();
                $getCategorys = $categorys->getCategorys();
        $erreur = $product->getErreur();
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
                    echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';
                }
                echo '</select>';
                // Fin du selecte.
                echo $form->inputFile('img', 'Ajouter une image du produit');
                echo $form->input('number', 'stocka', 'Stock Actuel');
                echo $form->input('number', 'stockm', 'Stock min');
                echo $form->input('date', 'expiration', 'Date d\'expiration');
                echo $form->textarea('desc', 'Veuillez décrire au maximum votre produit...');
                echo $form->submit('addProduct', 'Ajouter');
            ?>
        </form>
    </div>
</div>
