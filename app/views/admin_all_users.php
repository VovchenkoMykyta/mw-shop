<?php
$model = new \models\AdminModel();
$users = $model->getAllUsers();
?>
<h2>All users</h2>
<table><tr><th>id</th><th>login</th><th>password</th><th>email</th><th>options</th></tr>
<?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['login'] ?></td>
        <td><?= $user['password'] ?></td>
        <td><?= $user['email'] ?></td>
        <td>
            <form action="<?=\core\Router::getUrl('admin', 'deleteUser')?>" method="post">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="submit" value="Delete">
            </form>
        </td>
        <td>
            <form action="<?=\core\Router::getUrl('admin', 'editUser')?>" method="post">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="submit" value="Edit">
            </form>
        </td>
    </tr>
<?php endforeach; ?>
</table>
