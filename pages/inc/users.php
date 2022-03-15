<?php
if ($_SESSION['user']['roles'] != 'admin') {
    header('location: ./profile.php');
}
use \App\Entity\User;

?>

<div class="product_list">
    <div class="table-responsive">
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
                <?php $getUser = new User();
                $users = $getUser->getUsers();
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
                        <td>
                            <a href="../pages/admin.php?url=edit_user" class="btn rounded-1 green text-white" title="Modifier l'utilisateur"><i class="bi bi-pencil"></i></a>
                            <a href="../pages/admin.php?url=delete_user" class="btn rounded-1 red text-red light-4" title="Suspendre l'utilisateur"><i class="bi bi-person-x"></i></a>
                            <a href="../pages/admin.php?url=delete_user" class="btn rounded-1 red text-red light-4" title="Supprimer l'utilisateur"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>