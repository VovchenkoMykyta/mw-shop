<?php
$model = new \models\AdminModel();
$categories = $model->getCategory();
?>
<form action="<?= \core\Router::getUrl('admin', 'addProduct')?>" method="post" enctype="multipart/form-data">
    <label>Name:
        <input type="text" name="name" placeholder="Enter name of product">
    </label>
    <label>Characters:
        <textarea name="characters" cols="70" rows="10"></textarea>
    </label>
    <label>Describtion:
        <textarea name="describtion" cols="70" rows="10"></textarea>
    </label>
    <label>Choose category:
        <select name="category">
            <option disabled>Choose category</option>
            <?php foreach ($categories as $category): ?>
            <option value="<?=$category['id']?>"><?=$category['name']?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <label>Price:
        <input type="number" name="price" placeholder="Enter price">
    </label>
    <label>Brand:
        <input type="text" name="manufacturer" placeholder="Enter a brand">
    </label>
    <label>Choose images:
        <input type="file" name="img[]" multiple="multiple">
    </label>
    <input type="submit" value="Add">
</form>