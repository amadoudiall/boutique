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
<div class="admin admin-addCategory mt-3">
    <div class="addCategory form">

        <?php $form = new bootstrapForm($_POST);
        $erreur = $category->getErreur();
        // If there is an error, display it
        if (isset($erreur)): ?>
            <div class="p-3 my-2 rounded-1 red light-4 text-red text-dark-4">
                <?= $erreur ?>
            </div>
        <?php endif ?>
        <!-- If there is an success, display it -->
        <?php $success = $category->getSuccess();
        if (isset($success)): ?>
            <div class="p-3 my-2 rounded-1 green light-4 text-green text-dark-4">
                <?= $success ?>
            </div>
        <?php endif ?>
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
