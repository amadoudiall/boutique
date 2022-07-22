<?php
use \App\Entity\Product;
$getProduct = new Product();

// Disabling the product
if(isset($_GET['disableProduct'])){
    $thisProduct = $getProduct->getProductById($_GET['disableProduct']);
    if($thisProduct['User_id'] == $_SESSION['user']['id'] OR $_SESSION['user']['roles'] == 'admin'){
        $getProduct->desactiveProduct($_GET['disableProduct']);
        $warning = 'Vous avez désactivé ce produit il ne sera plus disponible sur le site !';
    }else{
        $erreur = "Vous n'avez pas le droit de desactiver ce produit";
    }
}

// Enabling the product
if(isset($_GET['enableProduct'])){
    $thisProduct = $getProduct->getProductById($_GET['enableProduct']);
    // if stock actuel > 0
    if($thisProduct['stock_actuel'] > 0){
        if($thisProduct['User_id'] == $_SESSION['user']['id'] OR $_SESSION['user']['roles'] == 'admin'){
            $getProduct->activeProduct($_GET['enableProduct']);
            $success = "Le produit a été publié !";
        }else{
            $erreur = "Vous n'avez pas le droit d'activer ce produit";
        }
    }else{
        $erreur = "Vous ne pouvez pas publier ce produit car il n'a pas de stock actuel";
    }
}

if($_SESSION['user']['roles'] == 'admin'){
    $products = Product::getProducts();
}else{
    $products = $getProduct->getProductBySellerId($_SESSION['user']['id']);
}

?>
<div class="shadow-1 rounded-1 admin admin-product mt-3">
        <!-- If there is an error, display it -->
        <?php if (isset($erreur)): ?>
            <div class="p-3 my-2 rounded-1 red light-4 text-red text-dark-4">
                <?= $erreur ?>
            </div>
        <?php endif ?>
        <!-- If there is an success, display it -->
        <?php if (isset($success)): ?>
            <div class="p-3 my-2 rounded-1 green light-4 text-green text-dark-4">
                <?= $success ?>
            </div>
        <?php endif ?>
        
        <!-- If there is an warning, display it -->
        <?php if (isset($warning)): ?>
            <div class="p-3 my-2 rounded-1 orange light-4 text-orange text-dark-4">
                <?= $warning ?>
            </div>
        <?php endif ?>
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
                            <a href="../pages/admin.php?url=product&enableProduct=<?= $product['idProduct'] ?>" class="btn rounded-1 green text-white" title="Rendre ce produit disponible sur le site" <?php if($product['is_active'] == 1){ echo "disabled"; } ?> >Publier</a>
                            <a href="../pages/admin.php?url=product&disableProduct=<?= $product['idProduct'] ?>" class="btn rounded-1 red text-red light-4" title="Rendre ce produit indisponible sur le site" <?php if($product['is_active'] == 0){ echo "disabled"; } ?>><i class="bi bi-eye-slash"></i></a>
                            <a href="../pages/admin.php?url=editProduct&id=<?= $product['idProduct'] ?>" class="btn rounded-1 green text-white" title="Modifier le produit"><i class="bi bi-pencil"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>