<?php
$model = new \models\FrontModel();
$images = $model->getAllImg();


?>
<?php foreach ($images as $key => $image): ?>
        <img src="<?= $image['img_url'] ?>" alt="mans_jeans">
<?php endforeach; ?>