<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Test site</title>
    </head>
    <body>
    <header>
        <h1>Logo</h1>
        <a href="<?= \core\Router::getUrl('front', 'contacts')?>"><div>Contacts</div></a>
        <a href="<?= \core\Router::getUrl('front', 'main')?>"><div>Main</div></a>
    </header>
    <nav>
        <ul>
            <li>Pants</li>
            <li>T-shirts</li>
            <li>Underwear</li>
            <li>Boots</li>
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