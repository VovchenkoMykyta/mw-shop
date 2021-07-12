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
        $sql = "SELECT * FROM `users` where `delete_date` is null;";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /** Get $login and select user with the same login
     * @param $login string
     * @return mixed | array
     */
    public function getUser($login)
    {
        $sql = "SELECT password FROM `users` WHERE login = '$login'";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /** Add user to DataBase
     * @param $login | string
     * @param $password | string
     * @param $email |string
     */
    public function addUser($login, $password, $email)
    {
        $sql = "INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES (NULL, '$login', '$password', '$email');";
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

}