<?php
session_start();
use \App\Bdd\Bdd;
use \App\Entity\Product;
use \App\Controller\productComment;
use \App\Autoloader;


require('../src/Autoload/Autoloader.php');
Autoloader::register();

if(isset($_GET['product']) && !empty($_GET['product'])){
    $product = Product::getProductById($_GET['product']);
    
    $productComment = new productComment();
    
    if(isset($_POST['commenting']) and !empty($_POST['commenting'])){
        if(isset($_SESSION['user']) AND !empty($_SESSION['user'])){
            $userId = $_SESSION['user']['id'];
            $content = $_POST['comment'];
            $rating = $_POST['rating'];
            $date = date('Y-m-d H:i:s');
            $productComment->addComment($content, $rating, $product['id'], $userId, $date);
        }else{
            header('Location: ../pages/connexion.php');
        }
    }
}

$title = $product['nom'];

ob_start();
?>
<div class="product_page">
    <div class="product">
        <div class="product_image">
            <div class="Sirv" data-options="arrows:false">
                <div data-src="../assets/images/Product/<?= $product['img'] ?>"></div>
                <div data-src="../assets/images/Product/<?= $product['img'] ?>"></div>
                <div data-src="../assets/images/Product/<?= $product['img'] ?>"></div>
                <div data-src="../assets/images/Product/<?= $product['img'] ?>"></div>
            </div>
        </div>
        <div class="product_info">
            <div class="product_name">
                <h2><?= $product['nom'] ?></h2>
            </div>
            <div class="category">
                <a href="./category.php" class="clink">Trouver des produit similaires pour <?= $product['category'] ?></a>
            </div>
            <div class="reviews">
                <div class="rating">
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                </div>
                <div class="reviews_number">
                    4.5 reviews
                </div>
            </div>
            <hr>
            <form action="./panier.php" method="post">
                <div class="colors">
                    <div class="color_name">
                        <span>Color</span>
                    </div>
                    <div class="color_list">                   
                        <input type="radio" name="color" id="color" value="#ff5733" class="orang">
                        <input type="radio" name="color" id="color" value="#ff3333" class="rouge">
                        <input type="radio" name="color" id="color" value="#ffd133" class="jaune">
                        <input type="radio" name="color" id="color" value="#3cff33" class="vert">
                        <input type="radio" name="color" id="color" value="#33b2ff" class="bleu">
                        <input type="radio" name="color" id="color" value="#ff3390" class="rose">
                        <input type="radio" name="color" id="color" value="#FFF" class="blanc">
                    </div>
                </div>
                <div class="pointures">
                    <div class="pointure_name">
                        <span>Pointure</span>
                    </div>
                    <div class="pointure_list">
                        <input type="radio" name="pointure" id="pointure-36" value="36" class="pointure">
                        <input type="radio" name="pointure" id="pointure-37" value="37" class="pointure">
                        <input type="radio" name="pointure" id="pointure-38" value="38" class="pointure">
                        <input type="radio" name="pointure" id="pointure-39" value="39" class="pointure">
                    </div>
                </div>
                <div class="tailles">
                    <div class="taille_name">
                        <span>Taille</span>
                    </div>
                    <div class="taille_list">
                        <input type="radio" name="taille" id="taille-S" value="S" class="taille">
                        <input type="radio" name="taille" id="taille-M" value="M" class="taille">
                        <input type="radio" name="taille" id="taille-L" value="L" class="taille">
                        <input type="radio" name="taille" id="taille-XL" value="XL" class="taille">
                        <input type="radio" name="taille" id="taille-XXL" value="XXL" class="taille">
                        <input type="radio" name="taille" id="taille-XXXL" value="XXXL" class="taille">
                    </div>
                </div>
            </form>
        </div>
        
        <section class="primary-section container mt-3 white rounded-1">
            <header>
                <h1>Commentaires</h1>
            </header>
            <!-- Formulaire des commentaires et avis -->
            <div class="commente_form">
                <div class="stars">
                    <i class="bi bi-star" data-value="1"></i><i class="bi bi-star" data-value="2"></i><i class="bi bi-star" data-value="3"></i><i class="bi bi-star" data-value="4"></i><i class="bi bi-star" data-value="5"></i>
                </div>
                <form action="./product.php?product=<?= $product['id'] ?>" method="post">
                    <div class="form-group">
                        <label for="commentaire">Commentaire</label>
                        <textarea class="form-control" id="commentaire" name="comment" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="rating" value="0" id="rate">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <input type="submit" name="commenting" class="btn btn-primary" value="Envoyer">
                </form>
            </div>
            <hr>
            <!-- Afficher les commentaires -->
            <div class="commentairs">
                <?php
                $comments = $productComment->getComments($product['id']);
                foreach($comments as $comment){
                ?>
                <div class="commentair">
                    <div class="commentair_info">
                        <div class="commentair_name">
                            <?= $comment['comment'] ?>
                        </div>
                        <div class="commentair_date">
                            <?= $comment['created_at'] ?>
                        </div>
                    </div>
                    <div class="commentair_content">
                        <?= $comment['commentaire'] ?>
                    </div>
                    <div class="commentair_rating">
                        <?php
                        for($i = 1; $i <= $comment['rating']; $i++){
                        ?>
                        <i class="bi bi-star"></i>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </section>
    </div>
    <div class="right">
        <div class="title">
            <h2>Droite</h2>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();
require('../template/template.php');
?>