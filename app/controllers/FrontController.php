<?php


namespace controllers;


use core\View;

class FrontController
{
    public function contacts()
    {
        $view = new View();
        $view->render('contacts.php', 'default_view.php');
    }

    public function main()
    {
        $view = new View();
        $view->render('main.php', 'default_view.php');
    }
}