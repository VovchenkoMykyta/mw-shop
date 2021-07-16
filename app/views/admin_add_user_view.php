<form action="<?= \core\Router::getUrl('admin', 'addUser')?>" method="post">
    <label>Login:
        <input type="text" name="login" placeholder="Enter user login" required>
    </label>
    <label>Password:
        <input type="password" name="pass" placeholder="Enter user password" required>
    </label>
    <label>Email:
        <input type="email" name="email" placeholder="Enter email">
    </label>
    <label>Phone:
        <input type="tel" name="phone" placeholder="Enter phone">
    </label>
    <input type="submit" value="Add user">
</form>