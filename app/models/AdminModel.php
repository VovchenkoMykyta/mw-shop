<?php


namespace models;
include_once "config.php";

class AdminModel
{
    public $db;

    public function __construct()
    {
        $this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function getUser($login)
    {
        $sql = "SELECT password FROM `users` WHERE login = '$login'";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}