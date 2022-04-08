<?php
session_start();

use \App\Bdd\Bdd;
use \App\Entity\Product;
use \App\Entity\Panier;
use \App\Controller\addCommande;
use \App\Autoloader;

require('../src/Autoload/Autoloader.php');
Autoloader::register();
$Bd = new Bdd();
$getPanier = new Panier;

if($_SESSION['user']['roles'] == 'admin' OR $_SESSION['user']['roles'] == 'boutiquier'){
    $lien = '../pages/admin.php';
}else{
    $lien = '../pages/profile.php';
}

if(isset($_GET['commande']) and !empty($_GET['commande'])){
    $commande = new addCommande;
    $commande->add();
    header('location: '.$lien.'?url=myCommande');
}

// Modifier manuellement la quantité d'un produit dans le panier
if(isset($_POST['panier']['quantity']) AND $_POST['panier']['quantity'] > 0){
    
    $sessionId = $_SESSION['sessionId'];
    
    // si l'utilisateur est connecté
    if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])){
        $userId = $_SESSION['user']['id'];
    }else{
        $userId = null;
    }
    
    // recuperer le produit dans le panier
    $productInPanier = $getPanier->getProductPanierByUserId($userId, $sessionId);
    // si l'utilisateur a modifier la quantité de un ou de plusieurs produits
    foreach ($productInPanier as $key => $product) {
        
        // Si l'utilisateur a cliqué sur le bouton recalculer
        if(isset($_POST['panier']['quantity'][$product['Product_id']])){
            
            // Modified quantity
            $_SESSION['panier'][$product['Product_id']] = $_POST['panier']['quantity'][$product['Product_id']];
            // modified montant
            $montant = ($_SESSION['product']['price'][$product['Product_id']] * $_POST['panier']['quantity'][$product['Product_id']]);
            // update quantity & montant
            $getPanier->update($_POST['panier']['quantity'][$product['Product_id']], $product['Product_id'], $userId, $sessionId, $montant);
        }
    }
}

if(isset($_GET['product']) AND !empty($_GET['product'])){
    $productId = $_GET['product'];
    $montant = null;
     
    if(!isset($_SESSION['user']) OR empty($_SESSION['user'])){
        $userId = null;
        $sessionId = $_SESSION['sessionId'];
    }else{
        $userId = $_SESSION['user']['id'];
        $sessionId = $_SESSION['sessionId'];
    }
        
    $getPanier->addPanier($productId, $userId, $sessionId, $montant);
    header('location: HTTP_REFERER');
}
if(isset($_GET['del'])){
    $productId = $_GET['del'];
    
    $sessionId = $_SESSION['sessionId'];
    if(!isset($_SESSION['user']) AND empty($_SESSION['user'])){
        $userId = null;
    }else{
        $userId = $_SESSION['user']['id'];
    }
    
    $getPanier->dellete($productId, $userId, $sessionId);
}

if(isset($_GET['videPanier'])){
    
    if(!isset($_SESSION['user'])){
        $userId = null;
        $sessionId = $_SESSION['sessionId'];

    }else{
        $userId = $_SESSION['user']['id'];
        $sessionId = null;
    }
    $getPanier->dellAll($sessionId, $userId);
}
if(empty($_SESSION['panier'])){
    $products = array();
}else{
    // $productPanier = array_keys($_SESSION['panier']);
    $sessionId = $_SESSION['sessionId'];
    
    if(isset($_SESSION['user'])){
        $userId = $_SESSION['user']['id'];
    }else{
        $userId = null;
    }
    
    $products = $getPanier->getUserProductPanier($userId, $sessionId);

}

$title = "Panier";
ob_start();

// Si le panier contien quelque chose
if($products != null):
?>

<div class="panier mt-3">
    <div class="grix xs4 grille white rounded-1">
                
        <div class="col-xs4 col-md3 profile-infos">
            <div class="table-liste-infos">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOM</th>
                            <th>QUANTITE</th>
                            <th>PIX UNITAIRE</th>
                            <th>PRIX TOTAL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <form action="" method="post">
                        <tbody>
                            <?php foreach ($products as $key => $product) : $_SESSION['product']['price'][$product['id']] = $product['price'] ?>
                                <tr>
                                    <td><img src="../assets/images/Product/<?= $product['img'] ?>" alt=""></td>
                            
                                    <td><a href="/pages/product.php?product=<?= $product['id'] ?>"><?= $product['nom'] ?></a></td>
                            
                                    <td><input type="number" name="panier[quantity][<?= $product['id'] ?>]" id="" value="<?= $product['quantity'] ?>"></td>
                            
                                    <td><?= number_format($product['price'], 0, '', ' ') ?><span class="suffix"><?= Product::SUFFIX_DEVISE ?></span></td>
                            
                                    <td><?= number_format($product['montant'], 0, '', ' ') ?><span class="suffix"><?= Product::SUFFIX_DEVISE ?></span></td>
                            
                                    <td><a href="../pages/panier.php?del=<?= $product['id'] ?>" class="btn supp rounded-1 btn-outline btn-opening text-red"><span class="btn-outline-text"><i class="bi bi-x"></i> Supprimer</span></a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"><p>Une fois votre commande validée notre equipe vous contactera</p></td>
                                <td class="tot">TOTAL :</td>
                                <td><span><?= number_format($getPanier->total($products), 0, '', ' ') ?></span><span class="suffix"><?= Product::SUFFIX_DEVISE ?></span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>
                                    <button class="btn shadow-1 rounded-1 btn-outline text-blue" type="submit"><span class="btn-outline-text">Recalculer</span></button><br>
                                </td>
                                <td>
                                    <a href="./panier.php?videPanier=1" class="btn shadow-1 rounded-1 btn-outline btn-opening text-red"><span class="btn-outline-text">Vider le panier</span></a>
                                </td>
                            </tr>
                        </tfoot>
                    </form>
                </table>
            </div>
        </div>
        
        <div class="panier-infos row-sm1 row-md1 singleSide"> 
            <h2>Resumé du panier</h2>
            <h3>Vous avez <?= count($products); ?> produit dans le panier</h3>
            <p class="livraison-infos">
                <span>Livraison gratuit à partire de 90 000 F d'achat</span>
                livrée en moin de 48h.
            </p>
            <div class="btn-lib">
                <a href="../pages/panier.php?commande=1" class="btn btn-secondary">Finaliser la commande</a>
            </div>
        </div>
    </div>
    <section class="primary-section recently primarySection mt-3 white rounded-1">
        <header>
            <h1>Vues récements</h1>
            <a href="#">Voire plus</a>
        </header>
        <div class="products">
            <?php $products = Product::getProducts();
            foreach ($products as $key => $product) : ?>
                <div class="product shadow-1">

                    <span class="promo">-20%</span>
                    <span class="like"><a href="#"><i class="bi bi-heart"></i></a></span>
                    <a href="#"><img src="../assets/images/Product/<?= $product['img'] ?>" alt="produit"></a>
                    <div class="detaille">
                        <div class="title-price">
                            <h3><a href="#"><?= $product['nom'] ?></a></h3>
                            <span><?= $product['price'] ?></span>
                        </div>
                        <div class="review-buy">
                            <span><i class="bi bi-star-half"></i>3.8</span>
                            <a href="../pages/panier.php?product=<?= $product['idProduct'] ?>" class="btn btn-primary">Acheter</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
</div>
<?php 
else :
// Si non si le panier ne contien aucun produit
unset($_SESSION['panier']);
require('./inc/panier/emptyPanier.php');
endif;
$content = ob_get_clean();
require('../template/template.php');
?>