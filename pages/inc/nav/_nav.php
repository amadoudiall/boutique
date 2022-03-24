<nav class="navbar">
    <div class="logo">
        <a href="/"><img src="../assets/images/logo/logo1.png" alt="Logo Diapali"></a>
    </div>
    <form id="search">
        <div class="form-field">
            <div class="form-group rounded-5">
                <input type="search" id="name" class="form-control" placeholder="Rechercher..." />
                <button type="submit" name="search" class="form-group-item btn-ev shadow-1">Rechercher</button>
            </div>
        </div>
    </form>
    <ul>
        <li class="panier">
            <a href="../pages/panier.php">
                <i class="bi bi-cart2"></i>
            </a>
                <?php if(isset($_SESSION['panier'])):?>
                    <span class="badge"><?= count($_SESSION['panier']); ?></span>
                <?php endif ?>
        </li>
        <li class="dropdown_parent">
            <?php if (isset($_SESSION['user']) and !empty($_SESSION['user'])) : ?>

                <a href="#"><i class="bi bi-person-circle"></i> <?= $_SESSION['user']['nom'] ?></a>
                <ul class="dropdown_enfant">
                    <li>
                        <?php if ($_SESSION['user']['roles'] === 'admin') : ?>
                            <a href="../pages/admin.php">Tableau de bord</a>
                        <?php else : ?>
                            <a href="../pages/profile.php">Mon compte</a>
                        <?php endif ?>
                    </li>
                    <li>
                        <a href="../pages/connexion.php?logout=1">Se déconnecter</a>
                    </li>
                </ul>

            <?php else : ?>
                <a href="#">S'identifier</a>
                <ul class="dropdown_enfant">
                    <li>
                        <a href="../pages/inscription.php">S'inscrire</a>
                    </li>
                    <li>
                        <a href="../pages/connexion.php">Se connecter</a>
                    </li>
                </ul>
            <?php endif ?>
        </li>
        <li>
            <a href="#">A propos</a>
        </li>
    </ul>
</nav>