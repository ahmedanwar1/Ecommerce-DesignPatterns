<?php
include_once(__DIR__.'\IPaymentMethod.php');
include_once(__DIR__. '\..\config\DatabaseProxy.php');

class PaypalMethod implements IPaymentMethod {

  private $db;
  private $conn;

  public function __construct()
  {
    $this->db = new DatabaseProxy();
    $this->conn = $this->db->getConn();
  }

  public function pay($totalPrice, $paymentCredentials) {
    $balance = 0;

    $sql = "SELECT balance FROM paypal WHERE email='".$paymentCredentials["email"]."' && password='".$paymentCredentials["password"]."'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $balance = $row["balance"];
        
      }

      if($balance >= $totalPrice) {
        $sql = "UPDATE paypal SET balance=balance - ". $totalPrice ." WHERE email='".$paymentCredentials["email"]."'";
        if ($this->conn->query($sql) === FALSE) {
          return false;
        }
        return true;
      }
    } else {
      return false;
    }
  }
}
