<?php 
use App\Entity\Commande;

$getCommandes = new Commande();
$commandes = $getCommandes->getAllCommandeByUserId($_SESSION['user']['id']);
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
                        <td><a href="../pages/profile.php?url=detailleCommande&c=<?= $commande['id'] ?>">Detailles</a></td>
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