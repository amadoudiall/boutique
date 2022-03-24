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
        <a href="../pages/admin.php?url=users" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'users') { echo 'active'; } ?>"><i class="bi bi-people-fill"></i> Utilisateurs</a>
        <a href="../pages/admin.php?url=commande" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'commande') {echo 'active';} ?>"><i class="bi bi-file-earmark"></i> Commandes</a>
        <a href="../pages/admin.php?url=product" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'product') {echo 'active';} ?>"><i class="bi bi-cart"></i> Produits</a>
        <a href="../pages/admin.php?url=rapport" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'rapport') {echo 'active';} ?>"><i class="bi bi-graph-up"></i> Rapport</a>
        <a href="../pages/admin.php?url=setting" class="sidenav-link <?php if (isset($_GET['url']) and $_GET['url'] === 'setting') {echo 'active';} ?>"><i class="bi bi-gear"></i> Général</a>
    </div>
    <main>
        <?= $content ?>
    </main>

    <!-- Axentix JS minified version -->
    <script src="https://kit.fontawesome.com/33342bcb44.js" crossorigin="anonymous"></script>
</body>

</html>