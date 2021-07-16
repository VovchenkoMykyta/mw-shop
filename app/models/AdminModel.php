<?php


namespace models;
include_once "config.php";

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
    public function getUserPhone($id){
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

    public function addPhone($id, $phone){
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
    public  function editUser($id, $login, $email){
        $sql = "UPDATE `users` SET `login` = '$login', `email` = '$email' WHERE `users`.`id` = '$id';";
        $this->db->query($sql);
    }
    public function editUserPhone($id, $phone){

        $sql1 = "SELECT id FROM `phone_numbers` WHERE user_id = '$id'";
        $result = $this->db->query($sql1);
        if(is_array($phone)){
            $i = 0;
            foreach ($result as $item){
                $updateId = $item['id'];
                $phoneNum = $phone[$i];
                $sql2 = "UPDATE `phone_numbers` SET `phone_number` = '$phoneNum' WHERE `phone_numbers`.`id` = '$updateId';";
                $this->db->query($sql2);
                $i++;
                var_dump($updateId, $phoneNum, "new");
            }
        }else{
            $sql2 = "UPDATE `phone_numbers` SET `phone_number` = '$phone' WHERE `phone_numbers`.`user_id` = '$id';";
            $this->db->query($sql2);
        }
    }
}