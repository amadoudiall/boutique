<?php

use \App\Bdd\Bdd;
use \App\Entity\User;
use \App\HTML\bootstrapForm;
use \App\Controller\Connection;
use \App\Autoloader;

require('../src/Autoload/Autoloader.php');
Autoloader::register();

$login = new Connection();

if (isset($_POST['connection'])) {
    $login->Login();
}

if(isset($_GET['logout'])){
    $login->Logout();
    header("Location: /");
}
$title = "Connexion";
ob_start();
?>
<div class="inscription">
    <div class="form">

        <?php
        $form = new bootstrapForm($_POST);
        $erreur = $login->getErreur();
        if (isset($erreur)) {
            echo $erreur;
        } ?>
        <form class="form-material" action="" method="post">
            <?php
            echo $form->input('username', 'username', 'E-mail ou Téléphone');
            echo $form->inputPassword('pwd', 'Mot de passe...');
            echo $form->submit('connection', 'Se connecter');
            ?>
        </form>
    </div>
</div>
<?php $content = ob_get_clean();
require('../template/template.php');
?>