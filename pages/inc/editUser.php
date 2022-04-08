<?php
use App\Entity\User;
use App\Controller\editUser;
use App\HTML\bootstrapForm;

$editUser = new editUser();
$getUser = new User();

if($_SESSION['user']['roles'] != 'admin'){
    header('location: ./pages/profile.php');
}
if(isset($_POST['addUser'])){
    $editUser->addUser();
}

if(isset($_GET['url']) and $_GET['url'] === "editUser"){
    $id = $_GET['id'];
    $user = $getUser->getUserById($id);
    if(isset($_POST['editUser'])){
        $editUser->editUser($id, $getUser);
    }
    $submitValue = "Mettre à jour";
    $submitName = "editUser";
    
    if($_SESSION['user']['roles'] != 'admin'){
        header('location: HTTP_REFERER');
    }
    $request = $user;
    
}elseif(isset($_GET['url']) and $_GET['url'] === "addUser"){
    $request = $_POST;
    $submitValue = "Ajouter";
    $submitName = "addUser";
}
?>
<div class="container shadow-1 rounded-1  admin admin-editUser mt-3">
    <div class="editUser form">

        <?php $form = new bootstrapForm($request);
        $erreur = $editUser->getErreur();
        if (isset($erreur)) {
            echo $erreur;
        } ?>
        <form class="form-material" action="" method="post">
            <?php
            echo $form->input('text', 'nom', 'Nom');
            echo $form->input('text', 'prenom', 'Prénom');
            echo $form->input('text', 'adresse', 'Adresse');
            echo $form->input('tel', 'tel', 'Téléphone');
            echo "<select name='roles' class='form-control mb-3'>
                    <option>-- Role --</option>
                    <option value='admin'>Admin</option>
                    <option value='boutiquier'>Boutiquier</option>
                    <option value='client'>Client</option>
                </select>";
            echo $form->submit($submitName, $submitValue);
            ?>
        </form>
    </div>
</div>