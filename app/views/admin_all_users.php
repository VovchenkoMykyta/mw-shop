<?php
$model = new \models\AdminModel();
$users = $model->getAllUsers();
?>
<h2>All users</h2>
<table><tr><th>id</th><th>login</th><th>password</th><th>email</th><th>phone_number</th><th>creation_date</th><th colspan="3">options</th></tr>
<?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['login'] ?></td>
        <td><?= mb_substr($user['password'], 0, 15) . '...' ?></td>
        <td><?= $user['email'] ?></td>
        <td><?php $phones = $model->getUserPhone($user['id']);
         foreach ($phones as $phone){
             echo $phone['phone_number'];
         }
         ?></td>
        <td><?= $user['creation_date'] ?></td>
        <td>
            <form action="<?=\core\Router::getUrl('admin', 'deleteUser')?>" method="post">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="submit" value="Delete">
            </form>
        </td>
        <td>
            <form action="<?=\core\Router::getUrl('view', 'edit_user')?>" method="post">
                <input type="hidden" name="login" value="<?= $user['login'] ?>">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="hidden" name="phone_number" value="<?php foreach ($phones as $phone){
                    echo $phone['phone_number'];
                } ?>">
                <input type="hidden" name="email" value="<?= $user['email'] ?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="<?=\core\Router::getUrl('view', 'add_phone')?>" method="post">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="submit" value="Add Phone">
            </form>
        </td>
    </tr>
<?php endforeach; ?>
</table>
