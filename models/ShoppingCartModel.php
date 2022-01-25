<?php
include_once(__DIR__. '\..\config\DatabaseProxy.php');

class ShoppingCartModel {
  private $db;
  private $conn;

  public function __construct()
  {
    $this->db = new DatabaseProxy();
    $this->conn = $this->db->getConn();
  }

  //when user clicks on add to cart button
  public function insertItem($id, $quantity) {
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
    if(!isset($_SESSION["email"])) {
      die("Not logged in");
    }
    //check if item exists in item database
    $itemQuantity = 0;

    $sql = "SELECT quantity FROM item WHERE id=".$id;
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $itemQuantity = $row["quantity"];
      }
    }
    
    if($itemQuantity > 0) {
      //check if item already exists or not in cart
      $sql = "SELECT quantity FROM cart WHERE item_id=".$id;
      $result = $this->conn->query($sql);

      //if item exists, increment the quantity
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $newQuantity = $row["quantity"] + $quantity;
          if($newQuantity <= $itemQuantity)
          {
            $sql = "UPDATE cart SET quantity=". $newQuantity ." WHERE item_id=". $id;
          }
        }
      } else { //if not, insert item
        $sql = "INSERT INTO cart (email, item_id, quantity)
        VALUES ('".$_SESSION["email"]."', '".$id."', ".$quantity.")";
      } 
      
      if ($this->conn->query($sql) === TRUE) {
        //echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $this->conn->error;
      }
    }
    
  }

  public function removeItem($id) {
    $sql = "DELETE FROM cart WHERE item_id=".$id;

    if ($this->conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $this->conn->error;
    } 
  }

  public function updateItemQuantity($id, $quantity) {
    $stockItemQuantity = null; //quantity in stock

    $sql = "SELECT quantity FROM item WHERE id=".$id;
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $stockItemQuantity = $row["quantity"];
      }
    }
    if($quantity <= $stockItemQuantity) {
      $sql = "SELECT quantity FROM cart WHERE item_id=".$id;
      $result = $this->conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $sql = "UPDATE cart SET quantity=". $quantity ." WHERE item_id=". $id;
          if ($this->conn->query($sql) === TRUE) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $this->conn->error;
          } 
        }
      }  
    }
  }

  public function getTotalPrice() {
    $totalPrice = 0;

    $sql = "SELECT item.price, cart.item_id, cart.quantity FROM item INNER JOIN cart ON item.id=cart.item_id";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $totalPrice += $row["price"] * $row["quantity"]; 
      }
    } else {
      // echo "0 results";
    }
    return $totalPrice;
  }

  public function checkQuantity() {
    $sql = "SELECT item.price, item.quantity as stock_quantity, cart.item_id, cart.quantity FROM item INNER JOIN cart ON item.id=cart.item_id";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if($row["quantity"] > $row["stock_quantity"]){
          return false;
        }
      }
    } else {
      echo "no items";
      return false;
    }
    return true;
  }

  public function getAllItems() {
    // $sql = "SELECT * FROM cart";
    $sql = "SELECT item.price, cart.item_id, cart.quantity, item.name, item.img FROM item INNER JOIN cart ON item.id=cart.item_id";
    
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      return $result;
    } else {
      // echo "no items";
      return array();
    }
  }

  public function clearCart() {
    $sql = "DELETE FROM cart";

    if ($this->conn->query($sql) === FALSE) {
      echo "Error deleting record: " . $this->conn->error;
    }
  }
}
