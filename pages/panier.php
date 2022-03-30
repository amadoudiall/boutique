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

if(isset($_GET['commande']) and !empty($_GET['commande'])){
    $commande = new addCommande;
    $commande->add();
    header('location: ../pages/profile.php?url=myCommande');
}

if(isset($_POST['panier']['quantity'])){
    
    $sessionId = $_SESSION['sessionId'];
    if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])){
        $userId = $_SESSION['user']['id'];
    }else{
        $userId = null;
    }
    
    foreach ($_SESSION['panier'] as $productId => $panier) {
        if(isset($_POST['panier']['quantity'][$productId])){
            $_SESSION['panier'][$productId] = $_POST['panier']['quantity'][$productId];
            $montant = ($_SESSION['product']['price'][$productId] * $_POST['panier']['quantity'][$productId]);
            $getPanier->update($_POST['panier']['quantity'][$productId], $productId, $userId, $sessionId, $montant);
        }
    }
}

if(isset($_GET['product']) AND !empty($_GET['product'])){
    $productId = $_GET['product'];
    $montant = null;
     
    if(!isset($_SESSION['user']) OR empty($_SESSION['user'])){
        $userId = null;
        
        if(!isset($_SESSION['sessionId'])){     
            $_SESSION['sessionId'] = $_SERVER['REMOTE_ADDR'];
            $sessionId = $_SESSION['sessionId'];
        }else{
            $sessionId = $_SESSION['sessionId'];
        }
    }else{
        $userId = $_SESSION['user']['id'];
        
        if(!isset($_SESSION['sessionId'])){     
            $_SESSION['sessionId'] = $_SERVER['REMOTE_ADDR'];
            $sessionId = $_SESSION['sessionId'];
        }else{
            $sessionId = $_SESSION['sessionId'];
        }
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
                
        <div class="col-xs4 col-md3 profile-infos white rounded-1">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOM</th>
                            <th>QUANTITE</th>
                            <th>PIX U</th>
                            <th>PRIX TOTAL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <form action="" method="post">
                        <tbody>
                            <?php foreach ($products as $key => $product) : $_SESSION['product']['price'][$product['id']] = $product['price'] ?>
                                <tr>
                                    <td><img width="30px" src="../assets/images/Product/<?= $product['img'] ?>" alt=""></td>
                            
                                    <td><?= $product['nom'] ?></td>
                            
                                    <td><input type="number" name="panier[quantity][<?= $product['id'] ?>]" id="" value="<?= $product['quantity'] ?>"></td>
                            
                                    <td><?= number_format($product['price'], 0, '', ' '), Product::SUFFIX_DEVISE; ?></td>
                            
                                    <td><?= number_format($product['montant'], 0, '', ' '), Product::SUFFIX_DEVISE; ?></td>
                            
                                    <td><a href="../pages/panier.php?del=<?= $product['id'] ?>" class="btn shadow-1 rounded-1 btn-outline btn-opening text-red"><span class="btn-outline-text"><i class="bi bi-trash"></i></span></a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"><p>Une fois votre commande validée notre equipe vous contactera</p></td>
                                <td>TOTAL :</td>
                                <td><?= number_format($getPanier->total($products), 0, '', ' '), Product::SUFFIX_DEVISE; ?></td>
                                <td>
                                    <button class="btn shadow-1 rounded-1 btn-outline text-blue" type="submit"><span class="btn-outline-text">Recalculer</span></button><br>
                                </td>
                            </tr>
                        </tfoot>
                    </form>
                </table>
                <div class="deleteCarte">
                    <a href="./panier.php?videPanier=1" class="btn shadow-1 rounded-1 btn-outline btn-opening text-red"><span class="btn-outline-text">Vider le panier</span></a>
                </div>
            </div>
        </div>
        
        <div class="panier-infos white"> 
            <h2>Resumé du panier</h2>
            <h3>Vous avez <?= count($products); ?> produit dans le panier</h3>
            <p class="livraison-infos">
                <span>Livraison gratuit à partire de 90 000 F d'achat</span>
                livrée en moin de 48h.
            </p>
            <a href="../pages/panier.php?commande=1" class="btn btn-secondary">Finaliser la commande</a>
        </div>
    </div>
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