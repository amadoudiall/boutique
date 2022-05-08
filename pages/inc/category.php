<?php
use \App\Entity\Category;
$getCategory = new Category();
$categorys = $getCategory->getCategorys();

if($_SESSION['user']['roles'] != 'admin'){
    header('location: ./pages/admin.php');
}

$title = "Catégories"
?>
<div class="shadow-1 rounded-1 admin admin-category mt-3">
        <div class="utils">
            <h2>Catégories</h2>
            <div class="links">
                <a href="../pages/admin.php?url=addCategory" class="btn rounded-1 green text-white" title="Ajouter une Categorie"><i class="bi bi-plus"></i> Nouveau catégorie</a>
            </div>
        </div>
    <div class="table table-striped admin-table-list">
        <table>
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Nom</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($categorys as $key => $category) : ?>
                    <tr>
                        <td><?= $category['icon'] ?></td>
                        <td><?= $category['category'] ?></td>
                        <td><?= $category['descriptions']?></td>
                        <td id="lastTd">
                            <a href="../pages/admin.php?url=editCategory&id=<?= $category['id'] ?>" class="btn rounded-1 green text-white" title="Modifier la catégorie"><i class="bi bi-pencil"></i></a>
                            <a href="../pages/admin.php?url=product&delCategory=<?= $category['id'] ?>" class="btn rounded-1 red text-red light-4" title="Supprimer la catégorie"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>