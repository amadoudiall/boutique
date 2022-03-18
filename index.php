<?php

use \App\Bdd\Bdd;
use \App\Entity\Product;
use \App\HTML\bootstrapForm;
use \App\Autoloader;

session_start();

if (empty($_SESSION['user'])) {
    session_destroy();
}

require('./src/Autoload/Autoloader.php');
Autoloader::registerHome();

$title = "Accueil";
ob_start();
?>
<section class="section-primaire shadow-1">

    <div class="products">
        <?php $products = Product::getProducts();
        foreach ($products as $key => $product) : ?>
            <div class="product shadow-1">

                <span class="promo">-20%</span>
                <span class="like"><a href="#"><i class="bi bi-heart"></i></a></span>
                <a href="#"><img src="./assets/images/Product/<?= $product['img'] ?>" alt="produit"></a>
                <div class="detaille">
                    <div class="title-price">
                        <h3><a href="#"><?= $product['nom'] ?></a></h3>
                        <span><?= $product['price'] ?></span>
                    </div>
                    <div class="review-buy">
                        <span><i class="bi bi-star-half"></i>3.8</span>
                        <a href="./pages/product.php?product=<?= $product['idProduct'] ?>" class="btn btn-primary">Acheter</a>
                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </div>

</section>
<?php $content = ob_get_clean();
require('./template/template.php');
?>