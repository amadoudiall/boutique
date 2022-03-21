<?php
session_start();

if (empty($_SESSION['user'])) {
    header('location: ./connexion.php');
}

if ($_SESSION['user']['roles'] != 'client') {
    header('location: ./admin.php');
}

use \App\Autoloader;

require('../src/Autoload/Autoloader.php');
Autoloader::register();


$title = "Mon profile";
ob_start();

if (isset($_GET['url']) and $_GET['url'] === 'editProfile') {
    require('./inc/profile/editProfile.php');
} elseif (isset($_GET['url']) and $_GET['url'] === 'myCommande') {
    require('./inc/myCommandes.php');
} elseif (isset($_GET['url']) and $_GET['url'] === 'wishList') {
    require('./inc/wishList.php');
} else {
    require('./inc/profile/profile.php');
}

$content = ob_get_clean();
require('../template/profile.php');
