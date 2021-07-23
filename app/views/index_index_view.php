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
        <div class="footer_product">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $image['product_id']?>"/>
                <input type="submit" value="Buy" id="buy_input">
            </form>
            <div>
                <?php foreach ($prices as $price): ?>
                    <?php if ($image['product_id'] === $price['id']): ?>
                        <?= $price['price'] ?>
                    <?php endif;?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
