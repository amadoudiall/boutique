<?php
if ($_SESSION['user']['roles'] == 'profile') {
    header('location: ./profile.php');
}
use \App\Entity\User;
$getUser = new User();

if(isset($_GET['banUser']) AND !empty($_GET['banUser'])){
    $id = $_GET['banUser'];
    if($_SESSION['user']['roles'] == 'admin'){
        $getUser->setIs_active(3);
        $getUser->banUser($id);
    }
}
if(isset($_GET['checkUser']) AND !empty($_GET['checkUser'])){
    $id = $_GET['checkUser'];
    if($_SESSION['user']['roles'] == 'admin'){
        $getUser->setIs_active(1);
        $getUser->banUser($id);
    }
}
if(isset($_GET['delUser']) AND !empty($_GET['delUser'])){
    $id = $_GET['delUser'];
    if($_SESSION['user']['roles'] == 'admin'){
        $getUser->deleteUser($id);
    }
}
?>

<div class="container shadow-1 rounded-1 admin admin-users rounded-1 mt-3">
    <div class="utils">
        <h2>Utilisateurs</h2>
        <!-- Rechercher un produit -->
        <form id="search" action="admin.php?url=users" method="GET">
            <div class="form-field">
                <div class="form-group rounded-5">
                    <input type="search" name="url" id="name" class="form-control" placeholder="Rechercher un utilisateur" />
                    <button type="submit" name="search" class="form-group-item shadow-1"><i class="bi bi-search"></i> </button>
                </div>
            </div>
        </form>
        <div class="links">
            <a href="../pages/admin.php?url=addUser" class="btn rounded-1 green text-white" title="Modifier l'utilisateur"><i class="bi bi-plus"></i> Ajouter un utilisateur</a>
        </div>
    </div>
    <div class="table-responsive admin-table-list">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Age</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Date d'inscription</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $users = $getUser->getUsers();
                foreach ($users as $key => $user) : ?>
                    <tr>
                        <td><?= $user['prenom'] ?></td>
                        <td><?= $user['nom'] ?></td>
                        <td><?= $user['age'] ?></td>
                        <td><?= $user['adresse'] ?></td>
                        <td><?= $user['tel'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['roles'] ?></td>
                        <td><?= $user['created_at'] ?></td>
                        <td id="lastTd">
                            <a href="../pages/admin.php?url=editUser&id=<?= $user['id'] ?>" class="btn rounded-1 green text-white" title="Modifier l'utilisateur"><i class="bi bi-pencil"></i></a>
                            <?php if($user['is_active'] == 3): ?>
                                <a href="../pages/admin.php?url=users&checkUser=<?= $user['id'] ?>" class="btn rounded-1 green text-white" title="Réactiver l'utilisateur"><i class="bi bi-person-check"></i></a>
                                <a href="../pages/admin.php?url=users&delUser=<?= $user['id'] ?>" class="btn rounded-1 red text-red light-4" title="Supprimer l'utilisateur"><i class="bi bi-trash"></i></a>
                            <?php else : ?>
                                <a href="../pages/admin.php?url=users&banUser=<?= $user['id'] ?>" class="btn rounded-1 red text-red light-4" title="Suspendre l'utilisateur"><i class="bi bi-person-x"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>