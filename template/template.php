<?php 
if(!isset($_SESSION['sessionId'])){     
    $_SESSION['sessionId'] = $_SERVER['REMOTE_ADDR'];
    $sessionId = $_SESSION['sessionId'];
}else{
    $sessionId = $_SESSION['sessionId'];
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Axentix CSS minified version -->
    <link rel="stylesheet" href="../assets/axentix/axentix.min.css">
    <link href="../assets/style/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/slick/slick.css">
    <link rel="stylesheet" href="../assets/slick/slick-theme.css">
    <script src="../assets/axentix/axentix.min.js"></script>
    
    <title>Diapali | <?= $title ?></title>
</head>

<body class="layout">
    <div class="loader">
        <div class="lds-ellipsis">
            <div class="lds-ellipsis1"></div>
            <div class="lds-ellipsis2"></div>
            <div class="lds-ellipsis3"></div>
        </div>
    </div>
    <header class="header-nav">
        <?php if($title === 'Accueil'){require_once('./pages/inc/nav/_nav.php');}else{require_once('../pages/inc/nav/_nav.php');} ?>
    </header>
    <main>
        <?= $content ?>
    </main>
    
    <footer class="d-flex fx-col primary">
        <div class="container">
            <div class="grix xs3">
                <div>
                    <h6>A PROPOS</h6>
                    <a href="#">Qui sommes-nous</a><br>
                    <a href="#">Notre Boutique Officielle</a><br>
                    <a href="#">Nos conditions générales</a><br>
                    <a href="#">Nos conditions d'utilisation</a><br>
                    <a href="#">Nos conditions de vente</a><br>
                    <a href="#">Nos services de livraisons</a><br>
                </div>
                <div class="text-left">
                    <h6>ASIISTANCE</h6>
                    <a href="#">Services client</a><br>
                    <a href="#">Methodes de paiment</a><br>
                    <a href="#">Politique de retour</a><br>
                    <a href="#">Diapali Expresse</a><br>
                </div>
                <div class="text-left">
                    <h6>GAGNEZ DE L'ARGENT</h6>
                    <a href="#">Devenez vendeur</a><br>
                    <a href="#">Devenez partenaire</a><br>
                    <a href="#">Devenez livreur</a><br>
                </div>
            </div>
        </div>
        <div class="footer fx-center primary-dark dark-1">Copyright © 2022 - Diapali.com</div>
    </footer>

    <!-- Axentix JS minified version -->
    <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/slick/slick.min.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/form.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>