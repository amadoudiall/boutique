<?php
use App\Entity\Commande;
$getCommande = new Commande();
$erreur = null;
$userId = $_SESSION['user']['id'];

if(isset($_GET['c']) and !empty($_GET['c'])){
    // $productCommande = $getCommande->getUserProductByCommandeId($_GET['c'], $userId);
    $productCommande = $getCommande->getProductByCommandeId($_GET['c']);
    $userCommande = $getCommande->getAllCommandeByUserId($userId);
}else{
    $productCommande = null;
    $erreur = "Desolé cette commande n'est pas disponible !";
}

if($productCommande != null): ?>
 <div class="container shadow-1 rounded-1 admin admin-commandeDetaille mt-3">
    <div class="table table-striped admin-table-list">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Prix total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productCommande as $product): ?>
                    <tr>
                        <td><img src="../assets/images/Product/<?= $product['img'] ?>" alt="image du produit" width="30px"></td>
                        <td><a href="/pages/product.php?product=<?= $product['Product_id'] ?>"><?= $product['nom'] ?></a></td>
                        <td><?= $product['quantity'] ?></td>
                        <td><?= $product['priceU'] ?> <span class="suffix">FCFA</span></td>
                        <td><?= $product['priceT'] ?> <span class="suffix">FCFA</span></td>
                        <td><a href="../pages/product.php?product=<?= $product['Product_id'] ?>">Detaille</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
 </div>
<?php else: ?>
    <div class="commandes">
        <img src="../assets/images/logo/emptyCommande.png" alt="commande">
        <p><?= $erreur ?></p>
        <a href="/" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Commancer mon shopping</a>
    </div>
<?php endif ?>