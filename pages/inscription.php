<?php
session_start();

if(empty($_SESSION['user'])){
    session_destroy();
}

if(isset($_SESSION['user'])){
    $msg = "Vous etes déjà connecté a un compte !";
    header('location: ../index.php?msg='.$msg);
}

// the Last visited page is saved in the session
$last = $_SESSION['last_visited'];

use \App\Bdd\Bdd;
use \App\Entity\User;
use \App\Controller\Inscription;
use \App\HTML\bootstrapForm;
use \App\Autoloader;

require('../src/Autoload/Autoloader.php');
Autoloader::register();

$inscription = new Inscription();

if (isset($_POST['inscription'])) {
    $inscription->Subscrib($last);
}
$title = "Inscription";
ob_start();
?>
<div class="container mt-3 rounded-1 inscription">
    <div class="form">

        <?php $form = new bootstrapForm($_POST);
        $erreur = $inscription->getErreur();
        $success = $inscription->getSuccess();
        $warning = $inscription->getWarning();
        // If there is an error, display it
        if (isset($erreur)): ?>
            <div class="p-3 my-2 rounded-1 red light-4 text-red text-dark-4">
                <?= $erreur ?>
            </div>
        <?php endif ?>
        <!-- If there is an success, display it -->
        <?php if (isset($success)): ?>
            <div class="p-3 my-2 rounded-1 green light-4 text-green text-dark-4">
                <?= $success ?>
            </div>
        <?php endif ?>
        
        <!-- If there is an warning, display it -->
        <?php if (isset($warning)): ?>
            <div class="p-3 my-2 rounded-1 orange light-4 text-orange text-dark-4">
                <?= $warning ?>
            </div>
        <?php endif ?>
        <form class="form-material" action="" method="post">
            <div class="title-form mt-5">
                <img src="../assets/images/logo/logo2.png" alt="Logo diapali.com">
                <h2>Entrer vos informations</h2>
            </div>
            <?php
            echo $form->input('text', 'nom', 'Nom');
            echo $form->input('text', 'prenom', 'Prénom');
            echo $form->input('text', 'adresse', 'Adresse');
            echo $form->input('tel', 'tel', 'Téléphone');
            echo $form->inputPassword('pwd', 'Nouveau mot de passe');
            echo $form->inputPassword('pwdc', 'Confirmer le mot de passe');
            echo $form->submit('inscription', 'S\'inscrire');
            ?>
        </form>
        
        <!-- If user have acounte -->
        <div class="mt-5 hvc">
            <p>Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous !</a></p>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();
require('../template/template.php');
?>