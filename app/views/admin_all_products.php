<?php
$model = new \models\AdminModel();
$products = $model->getProducts();
?>

<div><h2>All products</h2></div>

<?php
echo "<table><tr><th>id</th><th>name</th><th>describtion</th><th>characters</th><th>category</th><th>price</th><th>manufacturer</th><th colspan='3'>options</th></tr>";
foreach ($products as $product){
    echo "<tr><td>" . $product['id'] . "</td>" . "<td>" . $product['name'] . "</td>" . "<td>" . $product['describtion'] . "</td>" . "<td>" . $product['characters'] . "</td>". "<td>" . $product['category_id'] . "</td>". "<td>" . $product['price'] . "</td>". "<td>" . $product['manufacturer'] . "</td>
    <td class='form'>
        <form action='' method='post'>
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
    </td></tr>";
}
echo "</table>";
?>
