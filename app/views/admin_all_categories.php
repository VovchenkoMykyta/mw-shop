<?php
$model = new \models\AdminModel();
$categories = $model->getCategories();
?>

<div><h2>All categories</h2></div>

<table><tr><th>id</th><th>name</th><th colspan="2">options</th></tr>
    <?php foreach ($categories as $category): ?>
        <tr><td><?= $category['id'] ?></td>
            <td><?= $category['name'] ?></td>
            <td class='form'>
                <form action="<?=\core\Router::getUrl('', '')?>" method='post'>
                    <input type='hidden' name='id' value="<?=$category['id'] ?>">
                    <input type='submit' value='Delete'>
                </form>
            </td>
            <td class='form'>
                <form action='' method='post'>
                    <input type='submit' value='Edit'>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
