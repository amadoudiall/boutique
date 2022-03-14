<?php
use \App\Bdd\Bdd;
use \App\Entity\Product;
use \App\Autoloader;


require('../src/Autoload/Autoloader.php');
Autoloader::register();
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
                <?php $products = Product::getProduct();
                foreach ($products as $key => $product) : ?>
                    <tr>
                        <td><img src="<?= $product['img'] ?>" alt=""></td>
                        <td><?= $product['nom'] ?></td>
                        <td><?= $product['price'], Product::SUFFIX_DEVISE ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['stock_actuel'] ?></td>
                        <td><?= $product['date_expiration'] ?></td>
                        <td><?= Product::SUFFIX_LOT, $product['lot_numero'] ?></td>
                        <td><?= Product::SUFFIX_CODE, $product['code'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a href="../pages/admin.php?url=addProduct" class="btn primary">Ajouter un produit</a>
    </div>
</div>