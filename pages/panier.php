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
    $userId = $_SESSION['user']['id'];
        
    $getPanier->addPanier($productId, $userId);
    header('location: HTTP_REFERER');
}

if(isset($_GET['del'])){
    $getPanier->dellete($_GET['del']);
}

if(!isset($_SESSION['panier'])){
    echo "Votre panier est vide !";
    $products = array();
}else{
    $productPanier = array_keys($_SESSION['panier']);
    $products = $Bd->query('SELECT * FROM Product WHERE id IN('.implode(',', $productPanier).')');
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
            <tbody>
                <form action="" method="post">
                    <?php foreach ($products as $key => $product) :?>
                    <tr>
                        <td><img src="../assets/images/Product<?= $product['img'] ?>" alt=""></td>
                        
                        <td><?= $product['nom'] ?></td>
                        
                        <td><input type="number" name="quantity[<?= $product['id'] ?>]" id="" value="<?= $_SESSION['panier'][$product['id']] ?>"></td>
                        
                        <td><?= number_format($product['price'], 0, '', ' '), Product::SUFFIX_DEVISE; ?></td>
                        
                        <td><a href="../pages/panier.php?del=<?= $product['id'] ?>" class="dellete btn red light-3 text-red"><i class="bi bi-trash"></i></a></td>
                    </tr>
                <?php endforeach ?>
                <button type="submit">Recalculer</button>
                </form>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean();
require('../template/template.php');
?>