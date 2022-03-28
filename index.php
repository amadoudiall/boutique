<?php

use \App\Bdd\Bdd;
use \App\Entity\Product;
use \App\HTML\bootstrapForm;
use \App\Autoloader;

if(!isset($_SESSION)){
    session_start();  
}

if (empty($_SESSION['user'])) {
    unset($_SESSION['user']);
}

require('./src/Autoload/Autoloader.php');
Autoloader::registerHome();

$title = "Accueil";
ob_start();
?>

<section class="section-width-sidebar mt-3 rounded-1 white">
    <div class="grix xs4 grille white rounded-1">
        <div class="sidebar-infos white"> 
            <h2 class="category">Catégories</h2>
        </div>
                
        <div class="col-xs2 col-md2 profile-infos rounded-1">
            <div class="caroulix" id="example-caroulix" data-ax="caroulix" data-ax-caroulix-autoplay-enabled="true" data-caroulix-indicators-enabled="true">
              <div class="caroulix-arrow caroulix-prev">
                <span class="iconify-inline font-s5" data-icon="mdi:chevron-left"></span>
              </div>
              <div class="caroulix-arrow caroulix-next">
                <span class="iconify-inline font-s5" data-icon="mdi:chevron-right"></span>
              </div>
              <div class="caroulix-item">
                <img src="https://picsum.photos/800/450?random=1" alt="img1" />
              </div>
              <div class="caroulix-item">
                <img src="https://picsum.photos/800/450?random=2" alt="img2" />
              </div>
              <div class="caroulix-item">
                <img src="https://picsum.photos/800/450?random=3" alt="img3" />
              </div>
              <div class="caroulix-item">
                <img src="https://picsum.photos/800/450?random=4" alt="img4" />
              </div>
            </div>
        </div>
        
        <div class="sidebar-infos white"> 
            <h2 class="category">Pub</h2>
        </div>
    </div>
</section>

<section class="primary-section mt-3 white rounded-1">
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
                        <a href="./pages/panier.php?product=<?= $product['idProduct'] ?>" class="btn btn-primary">Acheter</a>
                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </div>
</section>
<?php $content = ob_get_clean();
require('./template/template.php');
?>