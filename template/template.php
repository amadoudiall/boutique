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
    <header class="shadow-1 fixed">
        <?php if($title === 'Accueil'){require_once('./pages/inc/nav/_nav.php');}else{require_once('../pages/inc/nav/_nav.php');} ?>
    </header>
    <main>
        <?= $content ?>
    </main>

    <!-- Axentix JS minified version -->
    <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/slick/slick.min.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/form.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>