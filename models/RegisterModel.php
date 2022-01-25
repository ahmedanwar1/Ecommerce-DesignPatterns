<?php
include_once(__DIR__. '\..\config\DatabaseProxy.php');

class RegisterModel {
  private $db;
  private $conn;


  public function __construct() {
    $this->db = new DatabaseProxy();
    $this->conn = $this->db->getConn();
  }


  public function register($firstname,$lastname,$phonenumber,$address,$email,$password) {
    $stmt = $this->conn->prepare("insert into customer(firstname,lastname,phonenumber,address,email,password)
        values(?,?,?,?,?,?)");
        $stmt->bind_param("ssisss",$firstname,$lastname,$phonenumber,$address,$email,$password);
        $stmt->execute();
        header("Location: login.php");
        $stmt->close();
  }

}