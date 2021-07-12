<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="/css/index.css">
        <link rel="stylesheet" href="/css/admin_default.css">
        <link rel="stylesheet" href="/css/<?=stristr($pageFile, '.', true)?>.css">
    </head>
    <body>
        <header>
            <div>Admin panel</div>
        </header>
        <main>
            <div id="lsb">
                <ul>
                    <li><a href="<?= \core\Router::getUrl('view', 'admin_index')?>">Main</a></li>
                    <li>User
                        <ul>
                            <li><a href="<?= \core\Router::getUrl('view', 'add_user')?>">Add User</a></li>
                            <li><a href="<?= \core\Router::getUrl('view', 'all_users')?>">Users Info</a></li>
                        </ul>
                    </li>
                    <li>Product
                        <ul>
                            <li>All Products</li>
                        </ul>
                    </li>
                    <li>Category
                        <ul>
                            <li>All Categories</li>
                            <li>Add Category</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="main">
                <?php
                include_once 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $pageFile;
                ?>
            </div>
        </main>
        <footer>
            <span><a href="https://github.com/VovchenkoMykyta/mw-shop.git">VovchenkoMykyta &copy;</a></span>
        </footer>
    </body>
</html>