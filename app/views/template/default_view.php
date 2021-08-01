<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Test site</title>
        <link rel="stylesheet" href="/css/<?=stristr($pageFile, '.', true)?>.css">
        <link rel="stylesheet" href="/css/index.css">
    </head>
    <body>
    <header>
        <span><a href="<?= \core\Router::getUrl('index', 'index')?>"><img src="/images/small_logo.png" alt="Logo" id="main_logo"/></a></span>
        <div>
            <a href="<?= \core\Router::getUrl('view', 'contacts')?>"><div class="div_header">Contacts</div></a>
            <a href="<?= \core\Router::getUrl('view', 'main')?>"><div class="div_header">Main</div></a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="<?= \core\Router::getUrl('view', 'pants')?>">Pants</a></li>
            <li><a href="<?= \core\Router::getUrl('view', 't_shirts')?>">T-shirts</a></li>
            <li><a href="<?= \core\Router::getUrl('view', 'underwear')?>">Underwear</a></li>
            <li><a href="<?= \core\Router::getUrl('view', 'boots')?>">Boots</a></li>
        </ul>
    </nav>
    <main>
        <?php
        include_once 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $pageFile;
        ?>
    </main>
    <footer>
        <span><a href="https://github.com/VovchenkoMykyta/mw-shop.git">VovchenkoMykyta &copy;</a></span>
    </footer>
    </body>
</html>