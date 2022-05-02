<div class="panier">
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOM</th>
                    <th>QUANTITE</th>
                    <th>PIX U</th>
                    <th>PRIX TOTAL</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <form action="" method="post">
                <tbody>
                    <?php foreach ($products as $key => $product) :?>
                        <tr>
                            <td><img width="30px" src="../assets/images/Product/<?= $product['img'] ?>" alt=""></td>
                            
                            <td><?= $product['nom'] ?></td>
                            
                            <td><input type="number" name="panier[quantity][<?= $product['id'] ?>]" id="" value="<?= $product['quantity'] ?>"></td>
                            
                            <td><?= number_format($product['price'], 0, '', ' '), Product::SUFFIX_DEVISE; ?></td>
                            
                            <td><?= number_format($product['montant'], 0, '', ' '), Product::SUFFIX_DEVISE; ?></td>
                            
                            <td><a href="../pages/panier.php?del=<?= $product['id'] ?>" class="btn shadow-1 rounded-1 btn-outline btn-opening text-red"><span class="btn-outline-text"><i class="bi bi-trash"></i></span></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><p>Une fois votre commande validée notre equipe vous contactera</p></td>
                        <td>TOTAL :</td>
                        <td><?= number_format($getPanier->total($products), 0, '', ' '), Product::SUFFIX_DEVISE; ?></td>
                        <td>
                            <button class="btn shadow-1 rounded-1 btn-outline text-blue" type="submit"><span class="btn-outline-text">Recalculer</span></button><br>
                        </td>
                    </tr>
                </tfoot>
            </form>
        </table>
        <div class="deleteCarte">
            <a href="./panier.php?videPanier=1" class="btn shadow-1 rounded-1 btn-outline btn-opening text-red"><span class="btn-outline-text">Vider le panier</span></a>
        </div>
    </div>
</div>