<?php
use App\Entity\Commande;
use App\Entity\Panier;

$getCommande = new Commande();
$getPanier = new Panier();

$commandes = $getCommande->getAllCommandeByUserId($_SESSION['user']['id']);
$commandeEnCours = $getCommande->getUserCommandeByStatus($_SESSION['user']['id'], 'en cours');
$commandeValidee = $getCommande->getUserCommandeByStatus($_SESSION['user']['id'], 'livré');
$panier = $getPanier->getUserProductPanier($_SESSION['user']['id'], $_SESSION['sessionId']);
?>

<div class="profile-detaille">
    <div class="profile-home dashboard grix xs2">
        <div class="newusers item rounded-1 white">
            <div class="title-marked">
                <span class="rounded-1">Dans votre panier</span>
            </div>
            <span class="nombre"><?= count($panier) ?><em> Produits</em></span>
            <div class="title-marked-b">
                <a href="../pages/profile.php?url=panier" class="">Finaliser la commande</a>
            </div>
        </div>
        
        <div class="newusers item rounded-1 white">
            <div class="title-marked">
                <span class="rounded-1">Commandes en cours</span>
            </div>
            <span class="nombre"><?= count($commandeEnCours) ?><em> Commandes en cours</em></span>
            <div class="title-marked-b">
                <a href="../pages/profile.php?url=myCommande" class="">Voire mes commandes</a>
            </div>
        </div>
        
        <div class="newusers item rounded-1 white">
            <div class="title-marked">
                <span class="rounded-1">Commandes validées</span>
            </div>
            <span class="nombre"><?= count($commandeValidee) ?> <em> Commandes livré</em></span>
            <div class="title-marked-b">
                <a href="../pages/profile.php?url=panier" class="">Voire les détailles</a>
            </div>
        </div>
        
        <div class="newusers item rounded-1 white">
            <div class="title-marked">
                <span class="rounded-1">Dans votre liste de souhait</span>
            </div>
            <span class="nombre">6 <em>Produit</em></span>
            <div class="title-marked-b">
                <a href="../pages/profile.php?url=panier" class="">Voire la liste</a>
            </div>
        </div>
    </div>
    <a href="/" class="btn toHome"> <i class="bi bi-arrow-left"></i> Continuer mes achats</a>
</div>