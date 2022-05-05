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
    
    $comments = $productComment->getComments($product['idProduct']);
    
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
                    <p>Trouver des produit similaires à<a href="./category.php" class="clink"> <?= $product['category'] ?></a></p>
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
                        (<span class="rating_value" data-value="<?= round($moyenne['moyenne'], 1) ?>"><?= round($moyenne['moyenne'], 1) ?>/5</span>) <span class="nbr_rating"> <?= count($comments), ' Avis vérifiés'; ?> </span>
                        
                    </div>
                </div>
                <hr>
                <div class="prices">
                    
                    <?php if($product['promo'] > 0) :?>
                        <div class="prix-vente">
                            <span> <?= $product['price_sell'] ?> FCFA </span>
                        </div>
                        <div class="prix-norm">
                            <span> <?= $product['price'] ?> FCFA </span>
                        </div>
                        <?php else : ?>
                        <div class="prix-vente">
                            <span> <?= number_format($product['price'], 0, '', ' ') ?> FCFA </span>
                        </div>
                    <?php endif; ?>
                </div>
                <form action="./panier.php" class="addToCart" method="post">
                    <!-- If product has color -->
                    <?php if($product['color'] != 'auccun'): ?>
                        <div class="colors form_option mt-3">
                            <div class="color_name">
                                <span>Couleurs</span>
                            </div>
                            <div class="color_list">                   
                                <div class="vueColor vueOption">
                                    <?php $colors = explode('|', $product['color']); foreach($colors as $cs): if(strlen($cs) > 0): ?>
                                            <div class="<?= $cs ?>" data-value="<?= $cs ?>" title="<?= $cs ?>" ></div>
                                    <?php endif; endforeach; ?>
                                </div>
                            </div>
                            <input type="hidden" name="colors" value="" id="color_input">
                        </div>
                    <?php endif; ?>
                    
                    <!-- If product has shoe size -->
                    <?php if($product['pointure'] != 'auccun'): ?>
                        <div class="pointures form_option mt-3">
                            <div class="pointure_name">
                                <span>Pointure</span>
                            </div>
                            <div class="pointure_list">
                                <div class="vueShoeSize vueSize">
                                    <?php $pointure = explode('|', $product['pointure']); foreach($pointure as $p): if(strlen($p) > 0): ?>
                                            <div class="<?= $p ?>" data-value="<?= $p ?>" title="<?= $p ?>" ><?= $p ?></div>
                                    <?php endif; endforeach; ?>
                                </div>
                            </div>
                            <input type="hidden" name="pointure" value="" id="shoeSize_input">
                        </div>
                    <?php endif; ?>
                    
                    <!-- If product has taille -->
                    <?php if($product['size'] != 'auccun'): ?>
                        <div class="taille form_option mt-3">
                            <div class="taille_name">
                                <span>Taille</span>
                            </div>
                            <div class="taille_list">
                                <div class="vueSize">
                                    <?php $taille = explode('|', $product['size']); foreach($taille as $t): if(strlen($t) > 0): ?>
                                            <div class="<?= $t ?>" data-value="<?= $t ?>" title="<?= $t ?>" ><?= $t ?></div>
                                    <?php endif; endforeach; ?>
                                </div>
                            </div>
                            <input type="hidden" name="taille" value="" id="size_input">
                        </div>
                    <?php endif; ?>
                    
                    <!-- Nombre de produit a mettre dans le panier -->
                    <div class="quantity_input mt-3">
                        <span id="moin">-</span><input type="number" name="quantity" value="1" min="1" max="10" id="quantity_input"><span id="plus">+</span>
                    </div>
                    
                    <!-- Submit -->
                    <input type="submit" name="add_to_cart" value="Ajouter au panier" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
        <section class="primary-section mt-3 white detaill-section rounded-1">
            <div class="tab" id="example-tab" data-ax="tab">
                <ul class="tab-menu">
                    <li class="tab-link">
                        <a href="#tab1">Description</a>
                    </li>
                    <li class="tab-link">
                        <a href="#tab2">Détailles</a>
                    </li>
                </ul>
                
                <!-- Here are your tab contents -->
                <div id="tab1" class="p-3"> <?= $product['descr'] ?> </div>
                <div id="tab2" class="p-3">
                    <p>Ici vous pouvez trouver tous les détailles concernant ce produit comme les dimensions, les pointures et les couleurs disponibles pour ce produit.</p>
                    <!-- Color -->
                    <?php if($product['color'] != 'auccun'): ?>
                        <p>
                            <strong>Couleur disponibles :</strong>
                            <?php $color = explode('|', $product['color']); foreach($color as $c): ?>
                                <span class="badge badge-primary"><?= $c ?></span> 
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                    
                    <!-- Size -->
                    <?php if($product['size'] != 'auccun'): ?>
                        <p>
                            <strong>Taille disponibles :</strong>
                            <?php $size = explode('|', $product['size']); foreach($size as $s): ?>
                                <span class="badge badge-primary"><?= $s ?></span> 
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                    
                    <!-- Dimentions -->
                    <?php if($product['dimensions'] != 'auccun'): ?>
                        <p>
                            <strong>Dimensions :</strong>
                            <?= $product['dimensions'] ?>
                        </p>
                    <?php endif; ?>
                    
                    <!-- Pointure -->
                    <?php if($product['pointure'] != 'auccun'): ?>
                        <p>
                            <strong>Pointure disponible:</strong>
                            <?php explode('|', $product['pointure']); foreach($pointure as $p): ?>
                                <span class="badge badge-primary"><?= $p ?></span>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
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