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
        
        if(!isset($_SESSION['panier']['id'])){     
            $_SESSION['panier']['id'] = rand(10000, 99000);
            $sessionId = $_SESSION['panier']['id'];
        }else{
            $sessionId = $_SESSION['panier']['id'];
        }
    }else{
        $userId = $_SESSION['user']['id'];
        $sessionId = null;
    }
        
    $getPanier->addPanier($productId, $userId, $sessionId);
    // header('location: HTTP_REFERER');
}

if(isset($_GET['del'])){
    $productId = $_GET['del'];
    
    if(!isset($_SESSION['user'])){
        $userId = null;
        $sessionId = $_SESSION['panier']['id'];

    }else{
        $userId = $_SESSION['user']['id'];
        $sessionId = null;
    }
    
    $getPanier->dellete($productId, $userId, $sessionId);
}

if(empty($_SESSION['panier'])){
    echo "Votre panier est vide !";
    $products = array();
}else{
    // $productPanier = array_keys($_SESSION['panier']);
    $productPanier = $_SESSION['panier']['id'];
    
    
    if(isset($_SESSION['user'])){    
        $userId = $_SESSION['user']['id'];
        $products = $Bd->query('SELECT * FROM Panier LEFT JOIN Product ON Product.id = Panier.Product_id WHERE Panier.User_id IN('.$userId.') ');
    }else{
        $products = $Bd->query('SELECT * FROM Panier LEFT JOIN Product ON Product.id = Panier.Product_id WHERE session_id IN('.$productPanier.') ');
    }
}
$title = "Panier";
ob_start();
?>
<div class="product_list">
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <form action="" method="post">
                <tbody>
                    <?php foreach ($products as $key => $product) :?>
                        <tr>
                            <td><img src="../assets/images/Product/<?= $product['img'] ?>" alt=""></td>
                            
                            <td><?= $product['nom'] ?></td>
                            
                            <td><input type="number" name="quantity[<?= $product['id'] ?>]" id="" value="<?= $product['quantity'] ?>"></td>
                            
                            <td><?= number_format($product['price'], 0, '', ' '), Product::SUFFIX_DEVISE; ?></td>
                            
                            <td><a href="../pages/panier.php?del=<?= $product['id'] ?>" class="dellete btn red light-3 text-red"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <button type="submit">Recalculer</button>
            </form>
        </table>
    </div>
</div>
<?php $content = ob_get_clean();
require('../template/template.php');
?>