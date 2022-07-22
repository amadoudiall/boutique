<?php

$title = "Ajouter un produit";
use App\HTML\bootstrapForm;
use App\Entity\Product;
use App\Controller\addProduct;
use App\Entity\Category;

$categorys = new Category();
$addProduct = new addProduct();

$getCategorys = $categorys->getCategorys();


if(isset($_POST['addProduct'])){
    $addProduct->add();
}

if(isset($_POST['editProduct'])){
    $addProduct->edit();
}

if(isset($_GET['url']) and $_GET['url'] === "editProduct"){
    $id = $_GET['id'];
    $submitValue = "Mettre à jour";
    $submitName = "editProduct";
    $getProduct = new Product();
    $product = $getProduct->getProductById($id);
    
    if($_SESSION['user']['id'] != $product['User_id'] and $_SESSION['user']['roles'] != "admin"){
        header('location: /');
    }
    $request = $product;
    
}elseif(isset($_GET['url']) and $_GET['url'] === "addProduct"){
    $request = $_POST;
    $submitValue = "Ajouter";
    $submitName = "addProduct";
}
?>
<div class="shadow-1 rounded-1 admin admin-addProduct mt-3">
    <div class="addProduct form">

        <?php $form = new bootstrapForm($request);
        $erreur = $addProduct->getErreur();
        // If there is an error, display it
        if (isset($erreur)): ?>
            <div class="p-3 my-2 rounded-1 red light-4 text-red text-dark-4">
                <?= $erreur ?>
            </div>
        <?php endif ?>
        <!-- If there is an success, display it -->
        <?php if (isset($success)): ?>
            <div class="p-3 my-2 rounded-1 green light-4 text-green text-dark-4">
                <?= $success ?>
            </div>
        <?php endif ?>
        <form class="form-material" action="" method="post" enctype="multipart/form-data">
            <?php
                // Product name input
                echo $form->input('text', 'nom', 'Nom du produit');
                
                // Price_by input
                echo $form->input('number', 'price_by', 'Combien avez-vous acheté le produit ?');
                
                // Price input
                echo $form->input('number', 'price', 'Combien devez-vous le vendre ?');
                
                // Categorys select
                echo '<select name="category" class="form-control rounded-1" id="select">';
                echo  '<option>Catégorie...</option>';
                foreach ($getCategorys as $key => $category) {
                    if(isset($product['Category_id']) and $category['id'] === $product['Category_id']){$selected = 'selected';}else{$selected = "";}
                    echo '<option value="'.$category['id'].'"'.$selected.'>'.$category['category'].'</option>';
                }
                echo '</select>';
                // End selecte.
                
                // Image FILE input
                echo $form->inputFile('img', 'Ajouter une image du produit'); 
            ?>
                <!--- If customer can choose color -->
                <div class="form-field toColorise mt-3">
                    <label class="form-check" for="toColorise">
                        <input type="checkbox" class="form-check toColorise_input" id="toColorise" name="option[]" value="toColorise">
                        <span>Laisser le clien choisire une couleure</span>
                    </label>
                </div>
                <!--- Each colors -->
                <div class="form-field color_container form_option hidden mt-3">
                    <div class="vueColor vueOption">
                        <div class="rouge" data-value="rouge" title="Rouge" ></div>
                        <div class="bleu" data-value="bleu" title="Bleu" ></div>
                        <div class="vert" data-value="vert" title="Vert" ></div>
                        <div class="jaune" data-value="jaune" title="Jaune" ></div>
                        <div class="orange" data-value="orange" title="Orange" ></div>
                        <div class="violet" data-value="violet" title="Violet" ></div>
                        <div class="noir" data-value="noir" title="Noir" ></div>
                        <div class="blanc" data-value="blanc" title="Blanc" ></div>
                        <div class="gris" data-value="gris" title="Gris" ></div>
                        <div class="marron" data-value="marron" title="Marron" ></div>
                        <div class="rose" data-value="rose" title="Rose" ></div>
                        <div class="beige" data-value="beige" title="Beige" ></div>
                        <div class="or" data-value="or" title="Or" ></div>
                        <div class="argent" data-value="argent" title="Argent" ></div>
                        <div class="turquoise" data-value="turquoise" title="Turquoise" ></div>
                    </div>
                    <input type="hidden" name="color" value="" id="color_input">
                </div>
                
                <!--- If customer can choose size -->
                <div class="form-field mt-3">
                    <label class="form-check" for="toSize">
                        <input type="checkbox" class="form-check" id="toSize" name="option[]" value="toSize">
                        <span>Laisser le clien choisire une taille (pour les vetements...)</span>
                    </label>
                </div>
                
                <!-- Each size -->
                <div class="form-field size_container form_option hidden mt-3">
                    <div class="vueSize vueOption size_Option">
                        <div class="xs" data-value="xs" title="XS" >XS</div>
                        <div class="s" data-value="s" title="S" >S</div>
                        <div class="m" data-value="m" title="M" >M</div>
                        <div class="l" data-value="l" title="L" >L</div>
                        <div class="xl" data-value="xl" title="XL" >XL</div>
                        <div class="xxl" data-value="xxl" title="XXL" >XXL</div>
                        <div class="xxxl" data-value="xxxl" title="XXXL" >XXXL</div>
                    </div>
                    <input type="hidden" name="size" value="" id="size_input">
                </div>
                
                <!--- If customer can choose shoe size -->
                <div class="form-field mt-3">
                    <label class="form-check" for="toShoeSize">
                        <input type="checkbox" class="form-check" id="toShoeSize" name="option[]" value="toShoeSize">
                        <span>Laisser le clien choisire une taille (pour les chaussures...)</span>
                    </label>
                </div>
                
                <!-- Each shoe size -->
                <div class="form-field shoeSize_container hidden form_option mt-3">
                    <p>Veuillez selectionner les différents pointures que vous avez en stock :</p>
                    <div class="vueShoeSize size_Option vueOption">
                        <div class="36" data-value="36" title="36" >36</div>
                        <div class="37" data-value="37" title="37" >37</div>
                        <div class="38" data-value="38" title="38" >38</div>
                        <div class="39" data-value="39" title="39" >39</div>
                        <div class="40" data-value="40" title="40" >40</div>
                        <div class="41" data-value="41" title="41" >41</div>
                        <div class="42" data-value="42" title="42" >42</div>
                        <div class="43" data-value="43" title="43" >43</div>
                        <div class="44" data-value="44" title="44" >44</div>
                        <div class="45" data-value="45" title="45" >45</div>
                        <div class="46" data-value="46" title="46" >46</div>
                        <div class="47" data-value="47" title="47" >47</div>
                        <div class="48" data-value="48" title="48" >48</div>
                        <div class="49" data-value="49" title="49" >49</div>
                        <div class="50" data-value="50" title="50" >50</div>
                        <div class="51" data-value="51" title="51" >51</div>
                        <div class="52" data-value="52" title="52" >52</div>
                        <div class="53" data-value="53" title="53" >53</div>
                        <div class="54" data-value="54" title="54" >54</div>
                        <div class="55" data-value="55" title="55" >55</div>
                        <div class="56" data-value="56" title="56" >56</div>
                    </div>
                    <input type="hidden" name="shoeSize" value="" id="shoeSize_input">
                </div>
                
                <!--- If customer can choose dimention -->
                <div class="form-field mt-3">
                    <label class="form-check" for="toDimention">
                        <input type="checkbox" class="form-check" id="toDimention" name="option[]" value="toDimention">
                        <span>Laisser le clien choisire une dimension (pour les produits mésurés en m ou en cm etc...)</span>
                    </label>
                </div>
                
                <!-- Dimentions -->
                <div class="form-field dimension_container hidden form_option mt-3">
                    <p>Veuillez sellectionner les dimension du produit :</p>
                    <div class="form-group">
                        <!-- Longuer -->
                        <input type="text" class="form-control" id="dimention_width" name="dimention_width" placeholder="Longeur">
                        <select class="form-control" id="dimention_width_unit" name="dimention_width_unit">
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="m">m</option>
                            <option value="pouce">pouce</option>
                        </select>
                        <!-- Largeur -->
                        <input type="text" class="form-control" id="dimention_depth" name="dimention_depth" placeholder="Largeur">
                        <select class="form-control" id="dimention_depth_unit" name="dimention_depth_unit">
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="m">m</option>
                            <option value="pouce">pouce</option>
                        </select>
                        <!-- Hauteur -->
                        <input type="text" class="form-control" id="dimention_height" name="dimention_height" placeholder="Hauteur">
                        <select class="form-control" id="dimention_height_unit" name="dimention_height_unit">
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="m">m</option>
                            <option value="pouce">pouce</option>
                        </select>
                    </div>
                </div>
                
                <!-- Hidded input for the productId -->
                <input type="hidden" name="Pid" value="<?= $id ?>">
                
            <?php
                // verifier si c'est un ajout ou une modification
                if($submitName == "editProduct"){    
                    // Promo input
                    echo $form->input('number', 'promo', 'Promo ex : 10');
                }
                // Stock_actuel input
                echo $form->input('number', 'stock_actuel', 'Stock Actuel');
                
                // Stock_min input
                echo $form->input('number', 'stock_min', 'Stock min');
                
                // date_expiration input
                echo $form->input('date', 'date_expiration', 'Date d\'expiration');
                
                // Description input
                echo $form->textarea('descr', 'Veuillez décrire au maximum votre produit...');
                // Submit button
                echo $form->submit($submitName, $submitValue);
                
                // End form
            ?>
        </form>
    </div>
</div>
