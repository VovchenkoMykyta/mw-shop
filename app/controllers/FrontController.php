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
    public function pants(){
        $view = new View();
        $view->render('pants_index.php', 'default_view.php');
    }
    public function t_shirts(){
        $view = new View();
        $view->render('t-shirt_index.php', 'default_view.php');
    }
    public function underwear(){
        $view = new View();
        $view->render('underwear_index.php', 'default_view.php');
    }
    public function boots(){
        $view = new View();
        $view->render('boots_index.php', 'default_view.php');
    }
}