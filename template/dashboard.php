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

<body class="layout-under-navbar">
    <div class="loader">
        <div class="lds-ellipsis">
            <div class="lds-ellipsis1"></div>
            <div class="lds-ellipsis2"></div>
            <div class="lds-ellipsis3"></div>
        </div>
    </div>
    <header>
        <div class="navbar-fixed">
            <?php require('../pages/inc/nav/_nav.php'); ?>
        </div>
    </header>

    <div id="example-sidenav" data-ax="sidenav" class="sidenav shadow-1 sidenav-fixed airforce dark-4">
        <div class="sidenav-header">
            <img class="sidenav-logo dropshadow-1" src="../assets/images/logo/logo2.png" alt="Logo" />
        </div>
        <a href="../pages/admin.php" class="sidenav-link <?php if (empty($_GET['url'])) {echo 'active'; } ?>"><i class="bi bi-house"></i> Tableau de bord</a>
        <?php if($_SESSION['user']['roles'] == 'admin'): ?>
            <a href="../pages/admin.php?url=users" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'users') { echo 'active'; } ?>"><i class="bi bi-people-fill"></i> Utilisateurs</a>
            <a href="../pages/admin.php?url=categorys" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'categorys') {echo 'active';} ?>"><i class="bi bi-tags"></i> Catégories</a>
        <?php endif; ?>
        <a href="../pages/admin.php?url=product" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'product') {echo 'active';} ?>"><i class="bi bi-cart"></i> Produits</a>
            <a href="../pages/admin.php?url=userCommande" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'userCommande') {echo 'active';} ?>"><i class="bi bi-file-earmark"></i> Commandes clients</a>
        <a href="../pages/admin.php?url=myCommande" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'myCommande') {echo 'active';} ?>"><i class="bi bi-archive-fill"></i> Mes commandes</a>
        <a href="../pages/admin.php?url=rapport" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'rapport') {echo 'active';} ?>"><i class="bi bi-graph-up"></i> Rapport</a>
        <a href="../pages/admin.php?url=setting" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'setting') {echo 'active';} ?>"><i class="bi bi-gear"></i> Général</a>
    </div>
    <main class="container">
        <?= $content ?>
    </main>
    <footer class="d-flex fx-col primary">
        <div class="container">
            <div class="grix xs3">
            <div>
                <h6>Left side of the footer</h6>
                <p>
                This is my phone number<br />
                01 23 45 67 89
                </p>
            </div>
            <div class="text-center">
                <h6>Middle of the footer</h6>
                <p>
                Welcome<br />
                I'm under "Welcome"
                </p>
            </div>
            <div class="text-right">
                <h6>Right side of the footer</h6>
                <p>
                This is my address<br />
                Route 12
                </p>
            </div>
            </div>
        </div>
        <div class="footer fx-center primary-dark">Copyright © 2022 - Example</div>
    </footer>
    <!-- Axentix JS minified version -->
    <script src="../assets/js/form.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>