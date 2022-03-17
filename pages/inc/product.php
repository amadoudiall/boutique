<?php
use \App\Entity\Product;
?>
<div class="product_list">
        <a href="../pages/admin.php?url=addCategory" class="btn primary">Gèrer les catégories</a>
        <a href="../pages/admin.php?url=addProduct" class="btn primary">Ajouter un produit</a>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $products = Product::getProducts();
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
                        <td>
                            <a href="../pages/admin.php?url=edit_user" class="btn rounded-1 green text-white" title="Modifier l'utilisateur"><i class="bi bi-pencil"></i></a>
                            <a href="../pages/admin.php?url=delete_user" class="btn rounded-1 red text-red light-4" title="Suspendre l'utilisateur"><i class="bi bi-person-x"></i></a>
                            <a href="../pages/admin.php?url=delete_user" class="btn rounded-1 red text-red light-4" title="Supprimer l'utilisateur"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>