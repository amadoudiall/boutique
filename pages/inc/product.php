<?php
use \App\Entity\Product;
$getProduct = new Product();

if(isset($_GET['delProduct'])){
    $thisProduct = $getProduct->getProductById($_GET['delProduct']);
    if($thisProduct['User_id'] == $_SESSION['user']['id'] OR $_SESSION['user']['roles'] == 'admin'){
        $getProduct->deleteProduct($_GET['delProduct']);
    }
}

if($_SESSION['user']['roles'] == 'admin'){
    $products = Product::getProducts();
}else{
    $products = $getProduct->getProductBySellerId($_SESSION['user']['id']);
}

?>
<div class="container shadow-1 rounded-1 admin admin-product mt-3">
        <div class="utils">
            <h2>Produits</h2>
            <!-- Rechercher un produit -->
            <form id="search" action="admin.php?url=product" method="GET">
                <div class="form-field">
                    <div class="form-group rounded-5">
                        <input type="search" name="url" id="name" class="form-control" placeholder="Rechercher un produit" />
                        <button type="submit" name="search" class="form-group-item shadow-1"><i class="bi bi-search"></i> </button>
                    </div>
                </div>
            </form>
            <div class="links">
                <a href="../pages/admin.php?url=addProduct" class="btn rounded-1 green text-white" title="Ajouter un produit"><i class="bi bi-plus"></i> Ajouter un produit</a>
            </div>
        </div>
    <div class="table table-striped admin-table-list">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Stock Actuel</th>
                    <th>Date d'expiration</th>
                    <th>Nombre de Ventes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $key => $product) : ?>
                    <tr>
                        <td><img src="../assets/images/Product/<?= $product['img'] ?>" alt=""></td>
                        <td><?= $product['nom'] ?></td>
                        <td><?= $product['price'], Product::SUFFIX_DEVISE ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['stock_actuel'] ?></td>
                        <?php if($product['date_expiration'] == '1970-01-01'): ?>
                            <td></td>
                        <?php else: ?>
                            <td><?= $product['date_expiration'] ?></td>
                        <?php endif ?>
                        <td><?= $product['ventes'] ?></td>
                        <td id="lastTd">
                            <a href="../pages/admin.php?url=editProduct&id=<?= $product['idProduct'] ?>" class="btn rounded-1 green text-white" title="Modifier l'utilisateur"><i class="bi bi-pencil"></i></a>
                            <a href="../pages/admin.php?url=product&delProduct=<?= $product['idProduct'] ?>" class="btn rounded-1 red text-red light-4" title="Supprimer l'utilisateur"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>