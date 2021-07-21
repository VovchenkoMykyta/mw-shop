<?php
$model = new \models\FrontModel();
$images = $model->getAllImg();
$prices = $model->getPrice();
?>
<div class="main_photo">
<?php foreach ($images as $key => $image): ?>
    <div>
        <?php if($key % 3 === 0 && $key !== 0):?>
        <div>
            <div class="break"></div>
        </div>
        <?php endif;?>
        <img src="<?= str_replace(" ", "", $image['img_url']) ?>" alt="<?= $image['img_url'] ?>">
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
