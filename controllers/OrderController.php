<?php
include_once(__DIR__ ."\..\models\OrderModel.php");
include_once(__DIR__ ."\..\controllers\ShoppingCartController.php");

class OrderController {
  private $ordertModel;
  private $shoppingCartController;

  public function __construct()
  {
    $this->ordertModel = new OrderModel();
  }

  public function getAllOrders() {
    $results = $this->ordertModel->getAllOrders();
    return $results;
  }

  public function saveOrderInHistory() {
    $this->shoppingCartController = ShoppingCartController::getInstance();

    $totalPrice = $this->shoppingCartController->getTotalItemPriceInCart();
    if($totalPrice > 0) {
      $insertId = $this->ordertModel->insertOrder($totalPrice);
      if(isset($insertId)) {
        $this->ordertModel->insertAllItemsInOrderedItem($insertId);
      }
    }
  }
}