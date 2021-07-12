<?php


namespace controllers;


use core\BaseController;
use core\Router;
use core\View;
use models\AdminModel;

class AdminController extends BaseController
{
    public function index()
    {
        $view = new View();
        $view->render('admin_login.php', 'admin_default_view.php');
    }

    public function verify()
    {
        $login = filter_input(INPUT_POST, 'login');
        $psw = filter_input(INPUT_POST, 'pass');
        $model = new AdminModel();
        $user = $model->getUser($login);
        var_dump($user, $login, $psw);
        foreach ($user as $item){
            $db_pass = $item['password'];
            if(password_verify($psw, $db_pass)){
                Router::redirect('view', 'admin_index');
            }else{
                Router::error404();
            }
        }
    }
}