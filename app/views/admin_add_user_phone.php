<?php
$id = filter_input(INPUT_POST, 'id');
?>
<form action="<?= \core\Router::getUrl('admin', 'addPhone')?>" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <label>Phone:
        <input type="tel" name="phone" placeholder="Enter phone">
    </label>
    <input type="submit" value="Add phone">
</form>
