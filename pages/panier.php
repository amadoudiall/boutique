<?php
session_start();

use \App\Bdd\Bdd;
use \App\Entity\Product;
use \App\Entity\Panier;
use \App\Autoloader;

require('../src/Autoload/Autoloader.php');
Autoloader::register();
$Bd = new Bdd();
$getPanier = new Panier;

if(isset($_GET['product']) AND !empty($_GET['product'])){
    $productId = $_GET['product'];
     
    if(!isset($_SESSION['user'])){
        $userId = null;
        
        if(!isset($_SESSION['sessionId'])){     
            $_SESSION['sessionId'] = rand(10000, 99000);
            $sessionId = $_SESSION['sessionId'];
        }else{
            $sessionId = $_SESSION['sessionId'];
        }
    }else{
        $userId = $_SESSION['user']['id'];
        $sessionId = null;
    }
        
    $getPanier->addPanier($productId, $userId, $sessionId, $montant);
    // header('location: HTTP_REFERER');
}
var_dump($_SESSION['sessionId']);
if(empty($_SESSION['panier'])){
    echo "Votre panier est vide !";
    $products = array();
}else{
    // $productPanier = array_keys($_SESSION['panier']);
    $sessionId = $_SESSION['sessionId'];
    
    
    if(isset($_SESSION['user']) and !empty($_SESSION['user'])){    
        $userId = $_SESSION['user']['id'];
        $products = $Bd->query('SELECT * FROM Panier LEFT JOIN Product ON Product.id = Panier.Product_id WHERE Panier.User_id IN('.$userId.') ');
    }else{
        $products = $Bd->query('SELECT * FROM Panier LEFT JOIN Product ON Product.id = Panier.Product_id WHERE session_id IN('.$sessionId.') ');
    }
}

if(isset($_POST['panier'])){
    foreach ($products as $productId => $panier) {
        if(isset($_POST['quantity'][$productId])){
            $_SESSION['panier'][$productId] = $nquantity['quantity'][$productId];
            $montant = ($product['price'] * $nquantity['quantity'][$productId]);
            $userId = $_SESSION['user']['id'];
            
            $getPanier->update($_POST['quantity'][$productId], $productId, $userId, $sessionId, $montant);
        }
        
        
    }
    $getPanier->recalc($products, );
}

if(isset($_GET['del'])){
    $productId = $_GET['del'];
    
    if(!isset($_SESSION['user'])){
        $userId = null;
        $sessionId = $_SESSION['sessionId'];

    }else{
        $userId = $_SESSION['user']['id'];
        $sessionId = null;
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

$title = "Panier";
ob_start();

// Si le panier contien quelque chose
if($products != null):
?>
<div class="panier">
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
                    <?php foreach ($products as $key => $product) :?>
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
<?php 
else :
// Si non si le panier ne contien aucun produit
require('./inc/panier/emptyPanier.php');
endif;
$content = ob_get_clean();
require('../template/template.php');
?>