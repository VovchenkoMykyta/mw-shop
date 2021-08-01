<?php

$id = filter_input(INPUT_POST, 'id');
$model = new \models\FrontModel();
$price = $model->getPrice();
$img = $model->getImgById($id);
$product = $model->getProduct($id);
//var_dump($product, $img);
?>

<div>
    <div class="prod_name">
        <?php
            echo $product[0]['name'];
        ?>
    </div>
    <?php for ($i = 0; $i < count($img); $i++): ?>
        <?php if ($img[$i]['char'] === 'main'): ?>
            <div><img src="<?= $img[$i]['img_url'] ?>" alt="main_product" class="main_prod"></div>
        <?php endif; ?>
        <?php if ($img[$i]['char'] === null): ?>
            <img src="<?= $img[$i]['img_url'] ?>" alt="main_product" class="additional">
        <?php endif; ?>
    <?php endfor; ?>
</div>
