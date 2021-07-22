<?php


namespace models;

class AdminModel
{
    public $db;

    /**
     * AdminModel constructor.
     */
    public function __construct()
    {
        $this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    /** Return all active users on site
     * @return mixed | array
     */
    public function getAllUsers()
    {
        $sql = "SELECT * FROM `users` WHERE users.delete_date is null";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /** Get $login and select user with the same login
     * @param $login string
     * @return mixed | array
     */
    public function getUser($login)
    {
        $sql = "SELECT id, password FROM `users` WHERE login = '$login'";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserPhone($id)
    {
        $sql = "SELECT phone_number FROM `phone_numbers` WHERE user_id = '$id'";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /** Add user to DataBase
     * @param $login | string
     * @param $password | string
     * @param $email |string
     * @param $creation_date | string
     * @param $phone | string
     */
    public function addUser($login, $password, $email, $creation_date, $phone)
    {
        $mysqli = $this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "INSERT INTO `users` (`id`, `login`, `password`, `email`, `creation_date`, `delete_date`) VALUES (NULL, '$login', '$password', '$email', '$creation_date', NULL);";
        $this->db->query($sql);
        $id = mysqli_insert_id($mysqli);
        $sql = "INSERT INTO `phone_numbers` (`id`, `user_id`, `phone_number`) VALUES (NULL, '$id', '$phone');";
        $this->db->query($sql);
    }

    public function addPhone($id, $phone)
    {
        $sql = "INSERT into `phone_numbers`(`id`, `user_id`, `phone_number`) VALUES (NULL, '$id', '$phone')";
        $this->db->query($sql);
    }

    /** Update column delete_date in DateBase with date of click on delete button near user
     * @param $id | sting
     * @param $delete_date | string
     */
    public function deleteUser($id, $delete_date)
    {
        $sql = "UPDATE `users` SET `delete_date` = '$delete_date' WHERE `users`.`id` = '$id';";
        $this->db->query($sql);
    }

    public function editUser($id, $login, $email)
    {
        $sql = "UPDATE `users` SET `login` = '$login', `email` = '$email' WHERE `users`.`id` = '$id';";
        $this->db->query($sql);
    }

    public function editUserPhone($id, $phone)
    {
        $sql1 = "SELECT id FROM `phone_numbers` WHERE user_id = '$id'";
        $result = $this->db->query($sql1);
        if (is_array($phone)) {
            $i = 0;
            foreach ($result as $item) {
                $updateId = $item['id'];
                $phoneNum = $phone[$i];
                $sql2 = "UPDATE `phone_numbers` SET `phone_number` = '$phoneNum' WHERE `phone_numbers`.`id` = '$updateId';";
                $this->db->query($sql2);
                $i++;
                var_dump($updateId, $phoneNum, "new");
            }
        } else {
            $sql2 = "UPDATE `phone_numbers` SET `phone_number` = '$phone' WHERE `phone_numbers`.`user_id` = '$id';";
            $this->db->query($sql2);
        }
    }

    public function getProducts()
    {
        $sql = "SELECT products.id, products.name, products.describtion, products.characters,categories.name as 'category',products.price, products.manufacturer FROM `products` INNER JOIN categories ON products.category_id = categories.id where `delete_character` is null";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteProduct($id, $char)
    {
        $sql = "UPDATE `products` SET `delete_character` = '$char' WHERE `products`.`id` = '$id';";
        $this->db->query($sql);
    }
    public function getCategory(){
        $sql = "SELECT * FROM `categories`";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function addProduct($name, $describtion, $characters, $category_id, $price, $manufacturer, $photo){
        $mysqli = $this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "INSERT INTO `products` (`id`, `name`, `describtion`, `characters`, `category_id`, `price`, `manufacturer`, `delete_character`) VALUES (NULL, '$name', '$describtion', '$characters', '$category_id', '$price', '$manufacturer', NULL);";
        $this->db->query($sql);
        $id = mysqli_insert_id($mysqli);
        for($i = 0; $i < count($photo); $i++){
            if($i === 0){
                $sql = "INSERT INTO `product_images` (`id`, `product_id`, `img_url`, `char`) VALUES (NULL, '$id', '$photo[$i]', 'main');";
                $this->db->query($sql);
            } else {
                $sql = "INSERT INTO `product_images` (`id`, `product_id`, `img_url`, `char`) VALUES (NULL, '$id', '$photo[$i]', NULL);";
                $this->db->query($sql);
            }
        }
    }

    public function getCategories(){
        $sql = "SELECT id, `name` FROM `categories`";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}