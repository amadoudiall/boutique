<?php

use \App\Bdd\Bdd;
use \App\Entity\User;
use \App\HTML\bootstrapForm;
use \App\Controller\Connection;
use \App\Autoloader;

require('../src/Autoload/Autoloader.php');
Autoloader::register();

$login = new Connection();
// the Last visited page is saved in the session
$last = $_SESSION['last_visited'];

var_dump($_SESSION['last_visited']);
if (isset($_POST['connection'])) {
    $login->Login($last);
}

if(isset($_GET['logout'])){
    $login->Logout();
    header("Location: /");
}
$title = "Connexion";
ob_start();
?>
<section class="container mt-3 connection">
    
    <div class="form rounded-1 mt-3">

        <?php
        $erreur = $login->getErreur(); 
        $success = $login->getSuccess();
        $warning = $login->getWarning();
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
        <form action="" method="post" id="connection">
            <div class="title-form mt-5">
                <img src="../assets/images/logo/logo2.png" alt="Logo diapali.com">
                <h2>Connectez-vous</h2>
            </div>
            <!-- Connection form -->
            <div class="form-field">
                <label for="email">Email ou Téléphone</label>
                <input type="username" class="form-control rounded-1" id="username" name="username" placeholder="E-mail ou Téléphone">
            </div>
            <div class="form-field">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control rounded-1" id="pwd" name="pwd" placeholder="Mot de passe...">
            </div>
            <div class="form-field">
                <button type="submit" class="btn btn-primary" name="connection">Se connecter</button>
            </div>
        </form>
        <!-- If user have not acount or forgot password-->
        <div class="mt-3 form-infos">
            <p>Vous avez pas de compte ? <a href="?page=inscription" class="text-dark-4">S'inscrire</a></p>
            <p>Mot de passe oublié ? <a href="?page=forgot" class="text-dark-4">Récuperer votre mot de passe</a></p>
        </div>
    </div>
</section>
<?php $content = ob_get_clean();
require('../template/template.php');
?>