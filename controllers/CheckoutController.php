<?php
include_once(__DIR__ ."\..\models\CheckoutModel.php");
include_once(__DIR__ ."\..\controllers\ShoppingCartController.php");
include_once(__DIR__ ."\..\controllers\OrderController.php");
include_once(__DIR__ ."\..\models\PaypalMethod.php");
include_once(__DIR__ ."\..\models\CreditCardMethod.php");
include_once(__DIR__ ."\..\controllers\PaymentFactory.php");

class CheckoutController {

  protected $shoppingCartController;
  private $orderController;
  private $checkoutModel;
  private $paymentMethod;

  public function __construct()
  {
    $this->shoppingCartController = ShoppingCartController::getInstance();
  }

  //paymentCredentials is an array holds payment info.
  public function checkout($paymentCredentials) {
    if(!isset($_SESSION["email"])) {
      die("Not logged in");
    }
    $checkQuantity = $this->shoppingCartController->checkQuantityInCart();
    if(!$checkQuantity) {
      echo "quantities of items are not satisfied";
      return;
    }
    $totalPrice = $this->shoppingCartController->getTotalItemPriceInCart();

    $paymentFactory = new PaymentFactory();
    $this->paymentMethod = $paymentFactory->getPaymentMethod($paymentCredentials["pay_method"]);
    
    if(isset($this->paymentMethod)) {
      $paymentStatus = $this->paymentMethod->pay($totalPrice, $paymentCredentials);
      return $paymentStatus;
    }
  }
}

//all the work would be here "strategy pattern"

/*
edit: this is for checkout class not payment
1. get user's email ===========>
2. get products in cart ==========>
3. check quantity of items ==============>
4. check balance 
5. update products
6. deduct the balance ===================>
7. remove product from cart
8. save order in history
*/