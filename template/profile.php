<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Axentix CSS minified version -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@2.0.0/dist/axentix.min.css">
    <link href="../assets/style/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/axentix@2.0.0/dist/axentix.min.js"></script>

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
        <?php require('../pages/inc/nav/_nav.php'); ?>
    </header>
    <main class="container mt-3">
        <div class="profile">
            <div class="grix xs4 grille white rounded-1">
                <div class="personal-infos white"> 
                       <img src="https://i.pravatar.cc/150?u=<?= $_SESSION['user']['id'] ?>" alt="avatar">
                        <h2><?= $_SESSION['user']['prenom'], ' ', $_SESSION['user']['nom'] ?></h2>
                        <h3><?= $_SESSION['user']['tel'] ?></h3>
                        <a href="../pages/profile.php?url=editProfile" class="btn btn-primary">Modifier</a>
                        <hr>
                        <div class="infos-complement">
                            <p>Adresse : <em><?= $_SESSION['user']['adresse'] ?></em></p>
                            <p>Mode de payment : <em>Payer à la ivraison</em></p>
                        </div>
                </div>
                
                <div class="col-xs4 col-md3 profile-infos white rounded-1">
                    <ul>
                        <li>
                            <a href="../pages/profile.php"><i class="bi bi-speedometer2"></i> Aperçue</a>
                        </li>
                        <li>
                            <a href="../pages/profile.php?url=myCommande"><i class="bi bi-bag"></i> Mes commandes</a>
                        </li>
                        <li>
                            <a href="../pages/profile.php?url=wishList"><i class="bi bi-clipboard-heart"> </i>Ma liste de souhait</a>
                        </li>
                    </ul>
                    <?= $content ?>
                </div>
            </div>
        </div>
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
        <div class="footer fx-center primary-dark">Copyright © 2022 - Diapali.com</div>
    </footer>
    <!-- Axentix JS minified version -->
    <script src="../assets/js/main.js"></script>
</body>

</html>