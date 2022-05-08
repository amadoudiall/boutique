<?php

use \App\Bdd\Bdd;
use \App\Entity\Product;
use \App\Entity\Category;
use \App\HTML\bootstrapForm;
use \App\Autoloader;

require('./src/Autoload/Autoloader.php');
Autoloader::registerHome();

$getCategory = new Category();
$categorys = $getCategory->getCategorys();

session_start();  

if (empty($_SESSION['user'])) {
    unset($_SESSION['user']);
}

$title = "Accueil";
ob_start();
?>

<section class="section-top">
    <div class="container">
      <div class="slider">
        <div class="">
          <img src="../assets/images/slider/slider1.png" alt="img1" />
          <div class="text_slider sl1">
            <h2>Bienvenue sur Diapali.com</h2>
            <p>Exposer vos produits sur notre platforme, nous nous occupons de trouver les clients pour vous !</p>
          </div>
        </div>
        <div class="">
          <img src="../assets/images/slider/slider2.png" alt="img2" />
          <div class="text_slider sl2">
            <h2>Devenez vendeur sur Diapali.com</h2>
            <p>Boostez vos ventes et faite gremper vore chiffre d'affaire grace a nos millier de visiteur règulières.</p>
          </div>
        </div>
        <div class="">
          <img src="../assets/images/slider/slider3.png" alt="img3" />
          <div class="text_slider sl3">
            <h2>Boostez vos ventes</h2>
            <p>Augmentez votre chiffre d'affaire grace a internet c'est une réalité !</p>
          </div>
        </div>
        <div class="">
          <img src="../assets/images/slider/slider4.png" alt="img4" />
          <div class="text_slider sl4">
            <h2>Atirer de nouveaux client</h2>
            <p>Nous enregistrions plus de 5 000 nouveaux visiteurs chaque jours, profitez-en pour vendre plus.</p>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="primary-section container mt-3 white rounded-1">
    <header>
        <h1>Les plus demandées</h1>
        <a href="#">Voire plus <i class="bi bi-chevron-right"></i></a>
    </header>
    <div class="products product-slider">
        <?php $products = Product::getProducts();
        foreach ($products as $key => $product) : ?>
            <div class="product shadow-1">

                <?php if ($product['promo'] > 0) : ?>
                  <span class="promo"><?= $product['promo'] ?>%</span>
                <?php endif; ?>
                <!-- Pour les likes -->
                <!-- <span class="like"><a href="#"><i class="bi bi-heart"></i></a></span> -->
                <a href="./pages/product.php?product=<?= $product['idProduct'] ?>"><img src="./assets/images/Product/<?= $product['img'] ?>" alt="produit"></a>
                <div class="detaille">
                    <div class="title-price">
                        <h3><a href="#"><?= $product['nom'] ?></a></h3>
                        <?php if ($product['promo'] > 0) : ?>
                          <span class="price"><?= $product['price_sell'] ?></span>
                          <span class="price-norm"><?= $product['price'] ?></span>
                        <?php else : ?>
                          <span class="price"><?= $product['price'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="review-buy">
                        <div class="reviews">
                            <!-- Les etoiles pour la note d'un utilisateure -->
                            <div class="stars_users" data-value="<?= $comment['rating'] ?>">
                                <i class="bi bi-star" data-value="1"></i>
                                <i class="bi bi-star" data-value="2"></i>
                                <i class="bi bi-star" data-value="3"></i>
                                <i class="bi bi-star" data-value="4"></i>
                                <i class="bi bi-star" data-value="5"></i>
                            </div>
                            <span class="reviews-count"><?= $product['rating'] ?></span>
                        </div> 
                        <a href="./pages/panier.php?product=<?= $product['idProduct'] ?>" class="btn btn-primary"><i class="bi bi-cart-plus"></i></a>
                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </div>
</section>

<section class="section-width-sidebar container mt-3 rounded-1 white">
    <div class="grix xs4 grille white rounded-1">
        <div class="sidebar-infos white"> 
            <h2 class="category">Catégories</h2>
            <?php
            foreach ($categorys as $key => $category): ?>
              <div class="c-item">
                <a href="./pages/category.php?category=<?= $category['id'] ?>" title="<?= $category['descriptions'] ?>"><?= $category['icon'] ?> <?= $category['category'] ?></a>
              </div>
            <?php endforeach ?>
        </div>
                
        <div class="col-xs2 col-md2 profile-infos rounded-1">
            
        </div>
        
        <div class="sidebar-infos white"> 
            <h2 class="category">Pub</h2>
        </div>
    </div>
</section>

<?php $content = ob_get_clean();
require('./template/template.php');
?>