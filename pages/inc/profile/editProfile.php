<?php
use App\HTML\bootstrapForm;
use App\Entity\User;
use App\Controller\editUser;

$getUser = new User();
$editUser = new editUser();

$id = $_SESSION['user']['id'];
if(isset($_POST['editProfile'])){
    $editUser->editUser($id, $getUser);
}
$form = new bootstrapForm();
?>

<div class="profile-detaille form">
        <?php $form = new bootstrapForm($_SESSION['user']);
        $erreur = $editUser->getErreur();
        if (isset($erreur)) {
             echo $erreur;
        } ?>
        <h2>Modifier vos information personel</h2>
        <form class="form-material" action="./profile.php?url=editProfile" method="post">
            <?php
                echo $form->input('text', 'nom', 'Nom');
                echo $form->input('text', 'prenom', 'Prénom');
                echo $form->input('text', 'adresse', 'Adresse');
                echo $form->input('tel', 'tel', 'Téléphone');
                echo $form->inputPassword('pwd', 'Mot de passe actuel');
                echo $form->inputPassword('npwd', 'Nouveau mot de passe');
                echo $form->inputPassword('npwdc', 'Confirmer le mot de passe');
                echo $form->submit('editProfile', 'Mettre à jour');
            ?>
        </form>
    </div>