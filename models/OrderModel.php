<?php
include_once(__DIR__. '\..\config\DatabaseProxy.php');
include_once(__DIR__. '\ShoppingCartModel.php');

class OrderModel {
  private $db;
  private $conn;
  private $shoppingCartModel;

  public function __construct()
  {
    $this->db = new DatabaseProxy();
    $this->conn = $this->db->getConn();
  }

  public function getAllOrders() {
    $sql = "SELECT * FROM orders";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      return $result;
    } 
  }

  public function insertOrder($totalPrice) {
    $sql = "INSERT INTO orders (email, order_total)
    VALUES ('".$_SESSION["email"]."', ".$totalPrice.")";

    if ($this->conn->query($sql) === FALSE) {
      echo "Error: " . $this->conn->error;
    }
    //return last inserted id of order
    return $this->conn->insert_id;
  }

  //inser all items in ordered_item table 
  public function insertAllItemsInOrderedItem($insertOrderId) {
    $this->shoppingCartModel = new ShoppingCartModel();

    $result = $this->shoppingCartModel->getAllItems();
    while($row = $result->fetch_assoc()) {
      $sql = "INSERT INTO ordered_item (order_id,	item_id)
      VALUES ('".$insertOrderId."', ".$row["item_id"].")";

      if ($this->conn->query($sql) === FALSE) {
        echo "Error: " . $this->conn->error;
      }
      
    }
  }
}