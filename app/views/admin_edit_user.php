<?php
    $user = [
        'id' => '',
        'login' => '',
        'email' => '',
        'phone_number' => '',
    ];
    $user['id'] .= filter_input(INPUT_POST, 'id');
    $user['login'] .= filter_input(INPUT_POST, 'login');
    $user['email'] .= filter_input(INPUT_POST, 'email');
    $user['phone_number'] .= filter_input(INPUT_POST, 'phone_number');
    $amountOfPhones = substr_count($user['phone_number'], '+');
    $phones = [];
    $phones = str_split($user['phone_number'], 13);
?>

<form action="<?=\core\Router::getUrl('admin', 'editUser')?>" method="post">
    <input type="hidden" name="id" value="<?=$user['id']?>">
    <label>Login:
        <input type="text" name="login" value="<?=$user['login']?>">
    </label>
    <label>Email:
        <input type="text" name="email" value="<?=$user['email']?>">
    </label>
    <?php
        if($amountOfPhones){
            for($i = 0; $i < $amountOfPhones; $i++){
                echo "<label> Phone:
                    <input type='text' name='phone_number[]' value='$phones[$i]'>
                </label>";
            }
        }
    ?>
    <input type="submit" value="Edit">
</form>
