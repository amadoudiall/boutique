<?php
$title = "Tableau de bord";
use App\Entity\Bdd;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Commande;

$getUsers = new User();
$getProducts = new Product();
$getCategorys = new Category();
$getCommande = new Commande();
$userId = $_SESSION['user']['id'];
$users = $getUsers->getUsers();
$products = $getProducts->getProducts();
$commandes = $getCommande->getCommandeByStatus('en attente');

?>
<div class="content dashboard rounded-1">
    <div class="grix xs4">
        
        <div class="newusers item rounded-1 white shadow-1">
            <div class="title-marked">
                <span class="rounded-1">Ventes de la semaine</span>
            </div>
            <span class="nombre">CFA 125K</span>
            <div class="title-marked">
                <span class="somelink vente-note">+5.4%</span>
            </div>
        </div>
        
        <div class="newusers item rounded-1 white shadow-1">
            <div class="title-marked">
                <span class="rounded-1">Commande validées</span>
            </div>
            <span class="nombre">45K</span>
            <div class="title-marked">
                <span class="somelink vente-note">+4.3%</span>
            </div>
        </div>
        
        <div class="newusers item rounded-1 white shadow-1">
            <div class="title-marked">
                <span class="rounded-1">Nouveau utilisateurs</span>
            </div>
            <span class="nombre">12k</span>
            <div class="title-marked">
                <span class="somelink vente-note">+8.6%</span>
            </div>
        </div>
        
        <div class="newusers item rounded-1 white shadow-1">
            <div class="title-marked">
                <span class="rounded-1">Nouveau produits</span>
            </div>
            <span class="nombre">150k</span>
            <div class="title-marked">
                <span class="somelink vente-note">+9.6%</span>
            </div>
        </div>
    </div>
    <div class="grix xs2">
        <div class="new-product table-infos white rounded-1 shadow-1">
            <div class="title-marked">
                <span class="rounded-1">Commande en attante</span>
            </div>
            <table class="table table-striped">
                <thead>
                    <th>N°</th>
                    <th>Date</th>
                    <th>Produits</th>
                    <th>Montant</th>
                </thead>
                <tbody>
                    <?php foreach ($commandes as $key => $commande) : $productCommandes = $getCommande->getProductByCommandeId($userId, $commande['id']);?>
                        <tr>
                            <td><?= $commande['id'] ?></td>
                            <td><?= $commande['createdAt'] ?></td>
                            <td><?= count($productCommandes); ?></td>
                            <td><?= $commande['montant'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td><a href="../pages/admin.php?url=userCommande" class="btn btn-primary">Gérer les commandes</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="new-product table-infos white rounded-1 shadow-1">
            <div class="title-marked">
                <span class="rounded-1">Nouveau produits</span>
            </div>
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                </thead>
                <tbody>
                    <?php foreach ($products as $key => $produc) :?>
                        <tr>
                            <td><img src="../assets/images/Product/<?= $produc['img'] ?>" alt=""></td>
                            <td><?= $produc['nom'] ?></td>
                            <td><?= $produc['category'] ?></td>
                            <td><?= $produc['price'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td><a href="../pages/admin.php?url=users" class="btn btn-primary">Gérer les utilisateurs</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>