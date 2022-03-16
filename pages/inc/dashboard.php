<?php
$title = "Tableau de bord";
use App\Entity\Bdd;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\Category;

$users = new User();
$product = new Product();
$category = new Category();

$nombreUser = count($users->getUsers());
$nombreProduct = count($product->getProducts());

?>
<div class="content">
    <div class="dashboard grix xs4">
        <div class="users item">
            <?= $nombreUser ?>
        </div>
        <div class="products item">
            <?= $nombreProduct ?>
        </div>
        <div class="commandes item">
            c
        </div>
        <div class="newusers item">
            d
        </div>
    </div>
</div>