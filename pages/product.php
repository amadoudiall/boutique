<?php

use \App\Bdd\Bdd;
use \App\Entity\Product;
use \App\Autoloader;


require('../src/Autoload/Autoloader.php');
Autoloader::register();

if(isset($_GET['product']) && !empty($_GET['product'])){
    $product = Product::getProductById($_GET['product']);
}
$title = $product['nom'];
ob_start();
?>
<div class="product">
    <div class="product_page">
        <div class="img_product">
            <img src="../assets/images/Product/<?= $product['img'] ?>" alt="<?= $product['nom'] ?>">
        </div>
    </div>
</div>
<?php $content = ob_get_clean();
require('../template/template.php');
?>