<?php


namespace controllers;


use core\BaseController;
use core\View;

class AdminController extends BaseController
{
    public function index()
    {
        $view = new View();
        $view->render('admin_default_view.php', 'admin_login.php');
    }
}