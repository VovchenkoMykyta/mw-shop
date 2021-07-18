<?php
$model = new \models\AdminModel();
$products = $model->getProducts();
?>

<div><h2>All products</h2></div>

<table><tr><th>id</th><th>name</th><th>descr...</th><th>charact...</th><th>cat...</th><th>price</th><th>manuf...</th><th colspan='3'>options</th></tr>
    <?php foreach ($products as $product): ?>
        <tr><td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['describtion'] ?></td>
            <td><?= $product['characters'] ?></td>
            <td><?= $product['category_id']?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['manufacturer'] ?></td>
            <td class='form'>
                <form action="<?=\core\Router::getUrl('admin', 'deleteProduct')?>" method='post'>
                    <input type='hidden' name='id' value="<?=$product['id'] ?>">
                    <input type='submit' value='Delete'>
                </form>
            </td>
            <td class='form'>
                <form action='' method='post'>
                    <input type='submit' value='Edit'>
                </form>
            </td>
            <td class='form'>
                <form action='' method='post'>
                    <input type='submit' value='Add'>
                </form>
            </td></tr>
    <?php endforeach; ?>
</table>
