<?php
$title = "Ajouter un produit";
use App\HTML\bootstrapForm;
use App\Entity\Category;
use App\Controller\addCategory;

$category = new addCategory();
if(isset($_POST['addCategory'])){
    $category->add();
}
?>
<div class="addCategory maint">
    <div class="form">

        <?php $form = new bootstrapForm($_POST);
        $erreur = $category->getErreur();
        if (isset($erreur)) {
            echo $erreur;
        } ?>
        <form class="form-material" action="" method="post">
            <?php
                echo $form->input('text', 'nom', 'Nom de la catégorie');
                echo $form->textarea('desc', 'Déscription de la catégorie...');
                echo $form->input('text', 'icon', 'Icone de la catégorie');
                echo $form->submit('addCategory', 'Ajouter');
            ?>
        </form>
    </div>
</div>
