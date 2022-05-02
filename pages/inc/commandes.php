<?php 
use App\Entity\Commande;
$getCommandes = new Commande();
$userId = $_SESSION['user']['id'];

if(isset($_GET['validerCommande']) and !empty($_GET['validerCommande'])){
    if($_SESSION['user']['roles'] == 'admin' OR $_SESSION['user']['roles'] == 'manager'){
        $getCommandes->updateCommandeStatus($_GET['validerCommande'], 'En cours');
    }
}

$lien = '';
if($_SESSION['user']['roles'] == 'admin'){
    $commandes = $getCommandes->getAllCommande();
}else{
    $commandes = $getCommandes->getCommandeBySellerProductId($userId);
}

if($_SESSION['user']['roles'] == 'admin' OR $_SESSION['user']['roles'] == 'boutiquier'){
    $lien = '../pages/admin.php';
}else{
    $lien = '../pages/profile.php';
}
 ?>
<div class="container shadow-1 rounded-1 admin admin-commandes mt-3">
    <?php if($commandes != null): ?>
    <div class="utils">
        <h2>Commandes en attente de validation</h2>
        <!-- Rechercher un produit -->
        <form id="search" action="admin.php?url=product" method="GET">
            <div class="form-field">
                <div class="form-group rounded-5">
                    <input type="search" name="url" id="name" class="form-control" placeholder="Rechercher une commande" />
                    <button type="submit" name="search" class="form-group-item shadow-1"><i class="bi bi-search"></i> </button>
                </div>
            </div>
        </form>
    </div>
    <div class="table table-striped admin-table-list">
        <table class="table">
            <thead>
                <tr>
                    <th>Commande n°</th>
                    <th>Date d'ouverture'</th>
                    <th>Livré le</th>
                    <th>Statut</th>
                    <th>Montant</th>
                    <th>Nombre de vos produit</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    
                <?php foreach($commandes as $commande): $nbrProduct = $getCommandes->countSellerProduct($commande['idCommande'],$userId);?>
                    <tr>
                        <td><?= $commande['idCommande'] ?></td>
                        <td><?= $commande['createdAt'] ?></td>
                        <td><?= $commande['chipedAt'] ?></td>
                        <td><?= $commande['status'] ?></td>
                        <td><?= $commande['montant'] ?> CFA</td>
                        <td><?= count($nbrProduct) ?></td>
                        <td><?= $commande['adresse'] ?></td>
                        <td>
                            <?php if($_SESSION['user']['roles'] == 'admin' OR $_SESSION['user']['roles'] == 'manager'): ?>
                                <a href="<?= $lien ?>?url=userCommande&validerCommande=<?= $commande['idCommande'] ?>&c=<?= $commande['id'] ?>" class="btn btn-secondary text-white"> Valider <i class="bi bi-check-lg"></i></a>
                                <a href="<?= $lien ?>?url=refuser&c=<?= $commande['idCommande'] ?>" class="btn shadow-1 rounded-1 btn-outline btn-opening text-red"><span class="btn-outline-text"> Refuser <i class="bi bi-x"></i></span></a>
                            <?php else : ?>
                                <a href="<?= $lien ?>?url=userCommandeDetille&c=<?= $commande['idCommande'] ?>" class="btn btn-primary"><i class="bi bi-eye"></i> Voir</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="commandes">
        <img src="../assets/images/logo/emptyCommande.png" alt="commande">
        <p>Vous n'avez pas de commande !</p>
        <a href="/" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Commancer mon shopping</a>
    </div>
    <?php endif ?>
</div>