<?php
$title = "Ajouter un produit";
use App\HTML\bootstrapForm;
use App\Entity\Category;
?>
<div class="inscription">
    <div class="form">

        <?php $form = new bootstrapForm($_POST);
                $categorys = new Category();
                $getCategorys = $categorys->getCategorys();
        /* $erreur = $inscription->getErreur();
        if (isset($erreur)) {
            echo $erreur;
        } */?>
        <form class="form-material" action="" method="post">
            <?php
                echo $form->input('text', 'nom', 'Nom du produit');
                echo $form->input('number', 'price', 'Prix');

                echo '<select name="category" class="form-control rounded-1" id="select">';
                echo  '<option>Catégorie...</option>';
                foreach ($getCategorys as $key => $category) {
                    echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';
                }
                echo '</select>';
                echo $form->input('text', 'img', 'Iamage');
                echo $form->input('number', 'stocka', 'Stock Actuel');
                echo $form->input('number', 'stockm', 'Stock min');
                echo $form->textarea('description', 'Veuillez décrire au maximum votre produit...');
                echo $form->submit('addProduct', 'Ajouter');
            ?>
        </form>
    </div>
</div>
