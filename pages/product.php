<?php

use \App\Bdd\Bdd;
use \App\Entity\Product;
use \App\Autoloader;


require('../src/Autoload/Autoloader.php');
Autoloader::register();
$title = "Liste des produits";
ob_start();
?>
<div class="product_list">
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Stock Actuel</th>
                    <th>Date d'expiration</th>
                    <th>Numéro de lot</th>
                    <th>Code d'article</th>
                </tr>
            </thead>
            <tbody>
                <?php $product = Product::getProductById($_GET['product']); var_dump($product);?>
                    <tr>
                        <td><img src="<?= $product['img'] ?>" alt=""></td>
                        <td><?= $product['nom'] ?></td>
                        <td><?= $product['price'], Product::SUFFIX_DEVISE ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['stock_actuel'] ?></td>
                        <td><?= $product['date_expiration'] ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean();
require('../template/template.php');
?>