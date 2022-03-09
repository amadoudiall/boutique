<?php
session_start();

if(empty($_SESSION['user'])){
    session_destroy();
}

if(isset($_SESSION['user'])){
    $msg = "Vous etes déjà connecté a un compte !";
    header('location: ../index.php?msg='.$msg);
}

use \App\Bdd\Bdd;
use \App\Entity\User;
use \App\Controller\Inscription;
use \App\HTML\bootstrapForm;
use \App\Autoloader;

require('../src/Autoload/Autoloader.php');
Autoloader::register();

$inscription = new Inscription();

if (isset($_POST['inscription'])) {
    $inscription->Subscrib();
}
$title = "Liste des produits";
ob_start();
?>
<div class="inscription">
    <div class="form">

        <?php $form = new bootstrapForm($_POST);
        $erreur = $inscription->getErreur();
        if (isset($erreur)) {
            echo $erreur;
        } ?>
        <form class="form-material" action="" method="post">
            <?php
            echo $form->input('text', 'nom', 'Nom');
            echo $form->input('text', 'prenom', 'Prénom');
            echo $form->input('number', 'age', 'Âge');
            echo $form->input('text', 'adresse', 'Adresse');
            echo $form->input('tel', 'tel', 'Téléphone');
            echo $form->input('email', 'email', 'E-mail');
            echo $form->inputPassword('pwd', 'Nouveau mot de passe');
            echo $form->inputPassword('pwdc', 'Confirmer le mot de passe');
            echo $form->submit('inscription', 'S\'inscrire');
            ?>
        </form>
    </div>
</div>
<?php $content = ob_get_clean();
require('../template/template.php');
?>