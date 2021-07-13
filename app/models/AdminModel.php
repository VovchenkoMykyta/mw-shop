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
    public function addUser($login, $password, $email, $creation_date)
    {
        $sql = "INSERT INTO `users` (`id`, `login`, `password`, `email`, `creation_date`, `delete_date`) VALUES (NULL, '$login', '$password', '$email', '$creation_date', NULL);";
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
        $sql = "UPDATE `phone_numbers` SET `phone_number` = '$phone' WHERE `phone_numbers`.`user_id` = '$id';";
        $this->db->query($sql);
    }
}