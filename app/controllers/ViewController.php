<?php


namespace controllers;

use core\View;

class ViewController
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
    public function admin_index(){
        $view = new View();
        $view->render('admin_index_view.php', 'admin_default_view.php');
    }
    public function add_user(){
        $view = new View();
        $view->render('admin_add_user_view.php', 'admin_default_view.php');
    }
    public function add_phone(){
        $view = new View();
        $view->render('admin_add_user_phone.php', 'admin_default_view.php');
    }
    public function all_users(){
        $view = new View();
        $view->render('admin_all_users.php', 'admin_default_view.php');
    }
    public function edit_user(){
        $view = new View();
        $view->render('admin_edit_user.php', 'admin_default_view.php');
    }
    public function all_products(){
        $view = new View();
        $view->render('admin_all_products.php', 'admin_default_view.php');
    }
}