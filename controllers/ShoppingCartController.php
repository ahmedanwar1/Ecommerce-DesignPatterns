<?php
include_once(__DIR__ ."\..\models\ShoppingCartModel.php");

class ShoppingCartController {
  private static $shoppingCart;
  protected $shoppingCartModel;

  private function __construct()
  {
    $this->shoppingCartModel = new ShoppingCartModel();
  }

  public static function getInstance() {
    if(!isset(self::$shoppingCart)) {
      self::$shoppingCart = new ShoppingCartController();
    }
    return self::$shoppingCart;
  }

  public function getAllItems() {
    return $this->shoppingCartModel->getAllItems();
  }

  public function addItemToCart($id, $quantity) {
    $this->shoppingCartModel->insertItem($id, $quantity);
    // echo $_SESSION["email"];
  }

  public function removeItemFromCart($id) {
    $this->shoppingCartModel->removeItem($id);
  }

  public function updateItemQuantityInCart($id, $quantity) {
    $this->shoppingCartModel->updateItemQuantity($id, $quantity);
  }

  public function getTotalItemPriceInCart() {
    $totalPrice = $this->shoppingCartModel->getTotalPrice();
    return $totalPrice;
  }

  public function checkQuantityInCart() {
    $checkQuantity = $this->shoppingCartModel->checkQuantity();
    return $checkQuantity;
  }

  public function clearCart() {
    $this->shoppingCartModel->clearCart();
  }
}