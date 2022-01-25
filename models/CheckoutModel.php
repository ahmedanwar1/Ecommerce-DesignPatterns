<?php
include_once(__DIR__. '\ShoppingCartModel.php');
include_once(__DIR__. '\ItemModel.php');
include_once(__DIR__. '\..\config\DatabaseProxy.php');

class CheckoutModel {
  private $db;
  private $conn;
  private $shoppingCartModel;
  private $itemModel;

  public function __construct()
  {
    $this->db = new DatabaseProxy();
    $this->conn = $this->db->getConn();
  }
  
  //update items after payment
  public function updateQuantityAfterCheckout() {
    $this->shoppingCartModel = new ShoppingCartModel();
    $this->itemModel = new ItemModel();

    $result = $this->shoppingCartModel->getAllItems();
    while($row = $result->fetch_assoc()) {
      $this->itemModel->decreaseQuantityOfItem($row["item_id"], $row["quantity"]);
    }
  }
}

/*
  -return paypal data and balance
  -return credit card data and balance
  -add product in order history
*/