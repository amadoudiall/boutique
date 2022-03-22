<?php
session_start();
use App\Entity\Panier;
use App\Autoloader;

require('../src/Autoload/Autoloader.php');
Autoloader::register();

if(isset($_GET['product']) AND !empty($_GET['product'])){
    $productId = $_GET['product'];
    $userId = $_SESSION['user']['id'];
    
    $getPanier = new Panier;
    
    $getPanier->addPanier($productId, $userId);
}