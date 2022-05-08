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
            // modified details
            if($product['detaille_options'] != null){
                $details = $product['detaille_options'];
            }else{
                $details = "Generic";
            }
            // update quantity & montant
            $getPanier->update($_POST['panier']['quantity'][$product['Product_id']], $product['Product_id'], $userId, $sessionId, $details, $montant);
        }
    }
}

if(isset($_GET['product']) AND !empty($_GET['product'])){
    $productId = $_GET['product'];
    $montant = null;
    $quantity = 1;
     
    if(!isset($_SESSION['user']) OR empty($_SESSION['user'])){
        $userId = null;
        $sessionId = $_SESSION['sessionId'];
    }else{
        $userId = $_SESSION['user']['id'];
        $sessionId = $_SESSION['sessionId'];
    }
    
    // Si les options sont selectionnées comme la couleur, la taille, etc...
    if(isset($_POST['options']) AND !empty($_POST['options'])){
        // Color is selected
        if(isset($_POST['options']['color']) AND !empty($_POST['options']['color'])){
            $color = $_POST['options']['color'];
        }else{
            $color = 'Generic';
        }
        
        // Size is selected
        if(isset($_POST['options']['size']) AND !empty($_POST['options']['size'])){
            $size = $_POST['options']['size'];
        }else{
            $size = 'Generic';
        }
        
        // Shoe Size is selected
        if(isset($_POST['options']['shoeSize']) AND !empty($_POST['options']['shoeSize'])){
            $shoeSize = $_POST['options']['shoeSize'];
        }else{
            $shoeSize = 'Generic';
        }
        
        // Quantity is selected
        if(isset($_POST['options']['quantity']) AND !empty($_POST['options']['quantity'])){
            $quantity = $_POST['options']['quantity'];
            // modified montant
            $montant = ($_POST['options']['price'] * $quantity);
        }
        
        // Mettre toute les options dans Detailles
        $details = 'Couleur: '.$color.', Taille: '.$size.', Pointure: '.$shoeSize;
        
    }
        
    $getPanier->addPanier($productId, $userId, $sessionId, $quantity, $details, $montant);
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

<div class="container panier mt-3">
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
                <!-- <a href="../pages/panier.php?commande=1" class="btn btn-secondary">Finaliser la commande</a> -->
                <a href="../pages/panier.php?checkout=1" class="btn btn-secondary">Finaliser la commande</a>
            </div>
        </div>
    </div>
    <?php
        // if checking out
        if(isset($_GET['checkout'])):
            // if user is logged in
            if(isset($_SESSION['user'])):
    ?>
    <section class="checkout-infos primary-section primarySection mt-3 white rounded-1">
        <header>
            <h1>Finaliser votre commande</h1>
        </header>
        <form action="?commande=1" method="post">
            <div class="chipping-infos container">
                <h2> Vos informations de livraison</h2>
                <div class="grix xs1 sm2">
                    <div class="form-field">
                        <label for="nom">Nom</label>
                        <input type="text" value="<?= $_SESSION['user']['prenom'], ' ',$_SESSION['user']['nom'] ?>" id="nom" class="form-control rounded-1" disabled />
                    </div>
                    <div class="form-field">
                        <label  for="tel">Téléphone</label>
                        <input type="tel" value="<?= $_SESSION['user']['tel'] ?>" id="tel" class="form-control rounded-1" disabled />
                    </div>
                    <div class="form-field col-sm2">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="adresse" value="<?= $_SESSION['user']['adresse'] ?>" class="form-control rounded-1" />
                        <span class="form-helper text-center">Vous pouvez cliquer sur le bouton me localiser pour vous faire livrer sur votre localisation actuel</span>
                    </div>
                    <div class="form-field col-sm2">
                        <button type="button" class="btn btn-primary btn-address" id="btn-address" title="Me géolocaliser"><i class="bi bi-geo-alt"></i> Me localiser</button>
                        <input type="hidden" id="coords" name="coords" value="" />
                    </div>
                    
                    <!-- Mode de payment -->
                    <div class="form-field col-sm2">
                        <label for="mode">Mode de paiement</label>
                        <select name="mode" id="mode" class="form-control rounded-1">
                            <option value="">Choisir votre mode de paiement</option>
                            <option value="1">Orange Money</option>
                            <option value="1">Carte bancaire</option>
                            <option value="2">Payer à la livraison</option>
                        </select>
                    </div>
                    <div class="form-field col-sm2">
                        <button type="submit" class="btn btn-primary" name="checkout">Finaliser la commande</button>
                    </div>
                </div>
                <!-- Embed google maps -->
                <div id="map" class="col-sm-12 hidden"></div>
            </div>
            <!-- submit -->
        </form>
    </section>
    <?php
        // if user is not logged in
        else:
            $erreur = "Veuillez vous connecter pour finaliser votre commande";
        endif;
     endif; ?>
     
    <!-- If user is not logged in -->
    <?php if(!isset($_SESSION['user'])): $_SESSION['last_visited'] = $_SERVER['REQUEST_URI']; ?>
        <section class="checkout-info primary-section primarySection mt-3 white rounded-1">
            <div class="container not_connected">
                <p>Identifiez-vous pour finaliser votre commande</p>
                <a href="connexion.php?last=1" class="btn btn-secondary">Se connecter</a>
                <p> Vous n'avez pas de compte ? <a href="inscription.php?last=1">S'inscrire</a> </p>
            </div>
        </section>
    <?php endif; ?>
    <section class="primary-section recently primarySection mt-3 white rounded-1">
        <header>
            <h1>Vues récements</h1>
            <a href="#">Voire plus</a>
        </header>
        <div class="products product-slider">
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