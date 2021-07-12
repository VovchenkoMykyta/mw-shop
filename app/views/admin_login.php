<form action="<?= \core\Router::getUrl('admin', 'verify')?>" method="post">
    <label> Login
        <input type="text" placeholder="Enter login" name="login">
    </label>
    <label> Password
        <input type="password" placeholder="Enter password" name="pass"/>
    </label>
    <input type="submit" value="login">
</form>
<?php
$psw = password_hash('admin', PASSWORD_DEFAULT );

var_dump(password_verify('admin', $psw));