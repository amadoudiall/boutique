<?php
use App\Entity\Commande;
use App\Entity\Product;
$getProduct = new Product();
$getCommande = new Commande();
$erreur = null;
$userId = $_SESSION['user']['id'];

// Valider un produit de la commande par le vendeur
// Si le vndeur click sur valider un produit de la commande
if(isset($_GET['valider']) and !empty($_GET['valider'])){
    // Recuperer les dataill de la commande
    $commandeDetaille = $getCommande->getProductCommandeById($_GET['valider']);
    // recuperer le produit de la commande
    $product = $getProduct->getProductById($commandeDetaille['Product_id']);
    // mettre a jour le stock actuel du produit
    $stock = ($product['stock_actuel'] - $commandeDetaille['quantity']);
    // Enregistrer la vente du produit
    $vente = ($product['ventes'] + $commandeDetaille['quantity']);
    // Recuperer L'id de la commande
    $commandeId = $commandeDetaille['Commande_id'];
    // Recuperer l'id du produit
    $productId = $commandeDetaille['Product_id'];
    // Recuperer l'id du vendeur
    $userId = $_SESSION['user']['id'];
    // Verifier si le produit est deja valider
    if($commandeDetaille['etat'] != 'Validé'){
        // Vrifier si le stock actuel est superieur au quantity
        if($product['stock_actuel'] > $commandeDetaille['quantity']){
            // Mettre a jour la commande et vendre le produit
            $getCommande->updateCommandeProduct('Validé', $commandeId, $productId, $stock, $userId, $vente);
            // Update cmmande status
            $getCommande->updateCommandeStatus($commandeId, "En cours");
            $success = 'Vous avez validé le produit !';
        }else{
            $erreur = "Desolé le stock actuel du produit est insuffisant !";
        }
    }else{
        $erreur = "Ce produit est déjà validé !";
    }
}

// Annuler une commande
// Si le vendeur click sur annuler une commande
if(isset($_GET['refuser']) and !empty($_GET['refuser'])){
    // Recuperer les dataill de la commande
    $commandeDetaille = $getCommande->getProductCommandeById($_GET['refuser']);
    // Recuperer le produit de la commande
    $product = $getProduct->getProductById($commandeDetaille['Product_id']);
    // Recuperer l'id de la commande
    $commandeId = $commandeDetaille['Commande_id'];
    // Recuperer l'id du produit
    $productId = $commandeDetaille['Product_id'];
    // Mettre a jour le stock actuel du produit
    $stock = ($product['stock_actuel'] + $commandeDetaille['quantity']);
    // Mettre a jour le nombre de vente du produit
    $vente = ($product['ventes'] - $commandeDetaille['quantity']);
    // Recuperer l'id du vendeur
    $userId = $_SESSION['user']['id'];
    // Verifier si le produit est deja Décliné
    if($commandeDetaille['etat'] != 'Décliné'){
        // Mettre a jour la commande et vendre le produit
        $getCommande->updateCommandeProduct('Décliné', $commandeId, $productId, $stock, $userId, $vente);
        $warning = 'Vous avez refusé le produit !';
    }else{
        $erreur = "Ce produit est déjà annulé !";
    }
}

// if(isset($_GET['refuser']) and !empty($_GET['refuser'])){
//     $getCommande->updateCommandeProductEtat($_GET['c'], $_GET['refuser'], 'Décliné');
// }

if(isset($_GET['c']) and !empty($_GET['c'])){
    if($_SESSION['user']['roles'] == 'admin'){
        $productCommande = $getCommande->getProductByCommandeId($_GET['c']);
    }else{
        $productCommande = $getCommande->getProductCommandeBySellerId($userId, $_GET['c']);
    }
    $userCommande = $getCommande->getAllCommandeByUserId($userId);
}else{
    $productCommande = null;
    $erreur = "Desolé cette commande n'est pas disponible !";
}
if($productCommande != null): ?>
 <div class="shadow-1 rounded-1 admin admin-users-commande-detaille rounded-1 mt-3">
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
    <div class="table-responsive admin-table-list">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Détailles</th>
                    <th>Etat</th>
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
                        <td><?= $product['detaille_options'] ?></td>
                        <td><?= $product['etat'] ?></td>
                        <td><?= $product['priceU'] ?> <span class="suffix">FCFA</span></td>
                        <td><?= $product['priceT'] ?> <span class="suffix">FCFA</span></td>
                        <td>
                            <a href="../pages/admin.php?url=userCommandeDetille&c=<?= $product['Commande_id'] ?>&valider=<?= $product['idProductCommande'] ?>" class="btn btn-secondary text-white" <?php if($product['etat'] == 'Validé'){echo 'disabled';} ?>> Valider <i class="bi bi-check-lg"></i></a>
                            <a href="../pages/admin.phpurl=userCommandeDetille&c=<?= $product['Commande_id'] ?>&refuser=<?= $product['idProductCommande'] ?>" class="btn shadow-1 rounded-1 red" title="Refuser" <?php if($product['etat'] == 'Décliné'){echo 'disabled';} ?>><i class="bi bi-x"></i></a>
                            <a href="../pages/product.php?product=<?= $product['Product_id'] ?>" class="btn btn-primary"><i class="bi bi-eye"></i> Voir</a>
                        </td>
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