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
            $productComment->addComment($content, $rating, $product['idProduct'], $userId, $date);
        }else{
            header('Location: ../pages/connexion.php');
        }
    }
    
}

$title = $product['nom'];

ob_start();
?>
<div class="product_page container">
    <div class="product">
        <div class="product_grix_info">
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
                    <!-- Les etoiles pour la note du produit -->
                    <div class="stars_rating">
                        <i class="bi bi-star" data-value="1"></i>
                        <i class="bi bi-star" data-value="2"></i>
                        <i class="bi bi-star" data-value="3"></i>
                        <i class="bi bi-star" data-value="4"></i>
                        <i class="bi bi-star" data-value="5"></i>
                    </div>
                    <div class="note_moyene">
                        <!-- Afficher la moyene des avis comments -->
                        <?php $moyenne = $productComment->getMoyenne($product['idProduct']);?>
                        <span class="rating_value" data-value="<?= round($moyenne['moyenne'], 1) ?>"> <?= round($moyenne['moyenne'], 1) ?> </span>
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
        </div>
        
        <section class="primary-section mt-3 white comment-section rounded-1">
            <h2>Avis utilisateurs</h2>
            <div class="content">
                <!-- Formulaire des commentaires et avis -->
                <div class="commente_form">
                    <p class="star-hovered">Donner une note</p>
                    <div class="stars_form">
                        <i class="bi bi-star" data-value="1"></i><i class="bi bi-star" data-value="2"></i><i class="bi bi-star" data-value="3"></i><i class="bi bi-star" data-value="4"></i><i class="bi bi-star" data-value="5"></i>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control" id="commentaire" name="comment" rows="3" placeholder="Que pensez-vous de ce produit ?"></textarea>
                        </div>
                        <input type="hidden" name="rating" value="0" id="rate">
                        <input type="hidden" name="product_id" value="<?= $product['idProduct'] ?>">
                        <input type="submit" name="commenting" class="btn btn-primary" value="Envoyer">
                    </form>
                </div>

                <!-- Afficher les commentaires -->
                <div class="commentairs">
                    <?php
                    $comments = $productComment->getComments($product['idProduct']);
                    foreach($comments as $comment){
                    ?>
                    <div class="commentair">
                        <div class="reviews">
                            <!-- Les etoiles pour la note d'un utilisateure -->
                            <div class="stars_users" data-value="<?= $comment['rating'] ?>">
                                <i class="bi bi-star" data-value="1"></i>
                                <i class="bi bi-star" data-value="2"></i>
                                <i class="bi bi-star" data-value="3"></i>
                                <i class="bi bi-star" data-value="4"></i>
                                <i class="bi bi-star" data-value="5"></i>
                            </div>
                            <span class="note_user" > ( <?= $comment['rating'] ?> étoiles) </span>
                        </div>
                        <div class="commentair_info">
                            <div class="commentair_auth">
                                <h3><?= $comment['prenom'] ?> <?= $comment['nom'] ?></h3>
                            </div>
                            <div class="commentair_content">
                                <p><?= $comment['comment'] ?></p>
                            </div>
                        </div>
                        <div class="commentair_date">
                            
                            <em><?= $comment['created_at'] ?></em>
                            <em class="acv">Achat vérifié</em>
                            <!-- Si l'hauteur du commentaire est celui connecté afficher le bouton supprimer -->
                            <?php if(isset($_SESSION['user']['id']) AND !empty($_SESSION['user']['id']) AND $_SESSION['user']['id'] == $comment['User_id']){ ?>
                                <a href="?delete=<?= $comment['idComment'] ?>" class="delete">Supprimer</a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
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