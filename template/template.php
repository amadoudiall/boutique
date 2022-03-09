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
    <header class="shadow-1 fixed">
        <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="../assets/images/logo/logo1.png" alt="Logo Diapali"></a>
            </div>
            <form id="search">
                <div class="form-field">
                    <div class="form-group rounded-5">
                        <input type="search" id="name" class="form-control" placeholder="Rechercher..." />
                        <button type="submit" name="search" class="form-group-item btn-ev shadow-1">Rechercher</button>
                    </div>
                </div>
            </form>
            <ul>
                <li class="panier">
                    <a href="#"> <i class="bi bi-cart2"></i> </a>
                </li>
                <li class="dropdown_parent">
                    <?php if (isset($_SESSION['user']) and !empty($_SESSION['user'])) : ?>

                        <a href="#"><i class="bi bi-person-circle"></i> <?= $_SESSION['user']['nom'] ?></a>
                        <ul class="dropdown_enfant">
                            <li>
                                <?php if ($_SESSION['user']['roles'] === 'admin') : ?>
                                    <a href="../pages/admin.php">Tableau de bord</a>
                                <?php else : ?>
                                    <a href="../pages/profile.php">Mon compte</a>
                                <?php endif ?>
                            </li>
                            <li>
                                <a href="../pages/connexion.php?logout=1">Se déconnecter</a>
                            </li>
                        </ul>

                    <?php else : ?>
                        <a href="#">S'identifier</a>
                        <ul class="dropdown_enfant">
                            <li>
                                <a href="../pages/inscription.php">S'inscrire</a>
                            </li>
                            <li>
                                <a href="../pages/connexion.php">Se connecter</a>
                            </li>
                        </ul>
                    <?php endif ?>
                </li>
                <li>
                    <a href="#">A propos</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <?= $content ?>
    </main>

    <!-- Axentix JS minified version -->
    <script src="https://kit.fontawesome.com/33342bcb44.js" crossorigin="anonymous"></script>
</body>

</html>