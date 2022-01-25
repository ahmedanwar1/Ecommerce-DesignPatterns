<?php
include_once(__DIR__. '\..\config\DatabaseProxy.php');

class LoginModel {
  private $db;
  private $conn;


  public function __construct() {
    $this->db = new DatabaseProxy();
    $this->conn = $this->db->getConn();
  }


  public function login($email, $password) {
    $stmt = $this->conn->prepare("select * from customer where email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password)
            {
                // header("Location: index.html");
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
  }




}