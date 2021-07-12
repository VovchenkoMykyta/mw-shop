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
    public function getAllUsers(){

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

    public function addUser(){
        $login = filter_input(INPUT_POST, 'login');
        $psw = filter_input(INPUT_POST, 'pass');
        $email = filter_input(INPUT_POST, 'email');
        $creation_date = date('Y-m-d H-i-s');
        $model = new AdminModel();
        $user = $model->getUser($login);
        if($user === []){
            $psw = password_hash($psw, PASSWORD_DEFAULT);
            $model->addUser($login, $psw, $email, $creation_date, null);
            Router::redirect('view', 'all_users');
        }else{
            echo "User exist";
        }
    }

    public function deleteUser(){
        $delete_date = date('Y-m-d H-i-s');
        $id = filter_input(INPUT_POST, 'id');
        $model = new AdminModel();
        $model->deleteUser($id, $delete_date);
//        var_dump($delete_date);
        Router::redirect('view', 'all_users');
    }
}