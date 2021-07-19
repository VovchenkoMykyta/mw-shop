<?php


namespace controllers;

include_once "config.php";
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
        $phone = filter_input(INPUT_POST, 'phone');
        $model = new AdminModel();
        $user = $model->getUser($login);
        if($user === []){
            $psw = password_hash($psw, PASSWORD_DEFAULT);
            $user = $model->getUser($login);
            $model->addUser($login, $psw, $email, $creation_date, $phone);
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
        Router::redirect('view', 'all_users');
    }

    public function addPhone(){
        $id = filter_input(INPUT_POST, 'id');
        $phone = filter_input(INPUT_POST, 'phone');
        $model = new AdminModel();
        $model->addPhone($id, $phone);
        Router::redirect('view', 'all_users');
    }

    public function editUser(){
        $userData = filter_input_array(INPUT_POST, FILTER_DEFAULT, true);
        $id = $userData['id'];
        $login = $userData['login'];
        $email = $userData['email'];
        $phone = $userData['phone_number'];
        $model = new AdminModel();
        $model->editUser($id, $login, $email);
        $model->editUserPhone($id, $phone);
        Router::redirect('view', 'all_users');
    }

    public function deleteProduct(){
        $id = filter_input(INPUT_POST, 'id');
        $char = 'deleted';
        $model = new AdminModel();
        $model->deleteProduct($id, $char);
        Router::redirect('view', 'all_products');
    }

    public function addProduct(){
        $product = filter_input_array(0, FILTER_DEFAULT, true);
        $pathPhoto = [];
        foreach ($_FILES["img"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["img"]["tmp_name"][$key];
                $name = basename($_FILES["img"]["name"][$key]);
                array_push($pathPhoto, '/images/'.$_FILES['img']['name'][$key]);
                move_uploaded_file($tmp_name, UPLOADS_DIR.$name);
            }
        }
        $model = new AdminModel();
        $model->addProduct($product['name'], $product['describtion'], $product['characters'], $product['category'], $product['price'], $product['manufacturer'], $pathPhoto);
        Router::redirect('view', 'all_products');
    }
}