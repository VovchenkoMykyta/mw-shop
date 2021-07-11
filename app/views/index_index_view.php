<?php
$model = new \models\FrontModel();
$images = $model->getAllImg();
$prices = $model->getPrice();
?>
<div class="main_photo">
<?php foreach ($images as $key => $image): ?>
    <div>
        <img src="<?= $image['img_url'] ?>" alt="mans_jeans">
        <div>
        <?php foreach ($prices as $price): ?>
            <?php if ($image['product_id'] === $price['id']): ?>
                <?= $price['price'] ?>
            <?endif;?>
        <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
</div>
