<?php
include_once(__DIR__."\..\controllers\LoginController.php");
include_once(__DIR__."\..\controllers\ShoppingCartController.php");
include_once(__DIR__."\..\controllers\CheckoutController.php");
include_once(__DIR__."\..\controllers\OrderController.php");
include_once(__DIR__."\..\controllers\RegisterController.php");
include_once(__DIR__."\..\models\CheckoutModel.php");

class EShopFacade {

  public function register($registerData) {
    $firstname = $registerData['firstname'];
    $lastname = $registerData['lastname'];
    $phonenumber = $registerData['phonenumber'];
    $address = $registerData['address'];
    $email = $registerData['email'];
    $password = $registerData['password'];

    $registerController = new RegisterController();

    $registerController->register($firstname,$lastname,$phonenumber,$address,$email,$password);
  }

  public function login($email, $password) {
    $loginController = new LoginController();
  
    $loginStatus = $loginController->login($email, $password);
  
    if($loginStatus) {
      $_SESSION["email"] = $email;
      header("Location: ../public/html/index.php");
    } else {
      header('Location: ../public/html/login.php');
    }
  }

  public function addItemToCart($itemId, $quantity) {
    $cartController = ShoppingCartController::getInstance();
    $cartController->addItemToCart($itemId, $quantity);
    header('Location: ../public/html/index.php');
  }

  public function deleteItemFromCart($itemId) {
    $cartController = ShoppingCartController::getInstance();
    $cartController->removeItemFromCart($itemId);
    header('Location: ../public/html/cart.php');
  }

  public function order($paymentCredentials) {
    $checkoutController = new CheckoutController();
    $paymentStatus = $checkoutController->checkout($paymentCredentials);
    if($paymentStatus) {
      //update product quantity
      $checkoutModel = new CheckoutModel();
      $checkoutModel->updateQuantityAfterCheckout();

      //save order in history
      $orderController = new OrderController();
      $orderController->saveOrderInHistory();
      
      //clear cart
      $cartController = ShoppingCartController::getInstance();
      $cartController->clearCart();

      // return true;
      header('Location: ../public/html/order_confirm.php');
    } else {
      echo "payment failed!";
      return false;
    }
  }

}