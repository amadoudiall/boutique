<?php
session_start();

if (empty($_SESSION['user'])) {
    header('location: ./connexion.php');
}

if ($_SESSION['user']['roles'] != 'admin') {
    header('location: ./profile.php');
}

use \App\Bdd\Bdd;
use \App\Entity\Product;
use \App\Controller\Inscription;
use \App\HTML\bootstrapForm;
use \App\Autoloader;

require('../src/Autoload/Autoloader.php');
Autoloader::register();


$title = "Admin";
ob_start();

if (isset($_GET['url']) and $_GET['url'] === 'product') {
    require('./inc/product.php');
} elseif (isset($_GET['url']) and $_GET['url'] === 'commande') {
    require('./inc/commandes.php');
} elseif (isset($_GET['url']) and $_GET['url'] === 'rapport') {
    require('./inc/rapports.php');
} elseif (isset($_GET['url']) and $_GET['url'] === 'setting') {
    require('./inc/settings.php');
} elseif (isset($_GET['url']) and $_GET['url'] === 'users') {
    require('./inc/users.php');
}elseif (isset($_GET['url']) and $_GET['url'] === 'editUser') {
    require('./inc/editUser.php');
}elseif (isset($_GET['url']) and $_GET['url'] === 'addProduct') {
    require('./inc/addProduct.php');
}elseif (isset($_GET['url']) and $_GET['url'] === 'editProduct') {
    require('./inc/addProduct.php');
}elseif (isset($_GET['url']) and $_GET['url'] === 'addCategory') {
    require('./inc/addCategory.php');
} else {
    require('./inc/dashboard.php');
}

$content = ob_get_clean();
require('../template/dashboard.php');
