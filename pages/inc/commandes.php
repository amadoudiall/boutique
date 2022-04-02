<?php 
use App\Entity\Commande;

$getCommandes = new Commande();
$commandes = $getCommandes->getAllCommande();
$lien = '';

if($_SESSION['user']['roles'] == 'admin' OR $_SESSION['user']['roles'] == 'boutiquier'){
    $lien = '../pages/admin.php';
}else{
    $lien = '../pages/profile.php';
}
 ?>
<div class="profile-detaille">
    <?php if($commandes != null): ?>
    <div class="table table-liste-infos">
        <table class="table">
            <thead>
                <tr>
                    <th>Commande n°</th>
                    <th>Date de création</th>
                    <th>Date de livraison</th>
                    <th>Statut</th>
                    <th>Montant</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($commandes as $commande): ?>
                    <tr>
                        <td><?= $commande['id'] ?></td>
                        <td><?= $commande['createdAt'] ?></td>
                        <td><?= $commande['chipedAt'] ?></td>
                        <td><?= $commande['status'] ?></td>
                        <td><?= $commande['montant'] ?> €</td>
                        <td><?= $commande['adresse'] ?></td>
                        <td>
                            <a href="<?= $lien ?>?url=valider&c=<?= $commande['id'] ?>" class="btn btn-secondary text-white"> Valider <i class="bi bi-check-lg"></i></a>
                            <a href="<?= $lien ?>?url=refuser&c=<?= $commande['id'] ?>" class="btn shadow-1 rounded-1 btn-outline btn-opening text-red"><span class="btn-outline-text"> Refuser <i class="bi bi-x"></i></span></a>
                            <a href="<?= $lien ?>?url=detailleCommande&c=<?= $commande['id'] ?>">Detailles →</a>
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