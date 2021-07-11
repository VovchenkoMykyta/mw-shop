<?php


namespace models;
include_once "config.php";

class FrontModel
{
    public $db;

    public function __construct()
    {
        $this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function getAllImg(){
        $sql = "SELECT img_url, `char` FROM `product_images` where `char` is not null;";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPrice(){
        $sql = "SELECT img_url, `char` FROM `product_images` where `char` is not null;";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}