<?php
include_once(__DIR__."\..\controllers\IPaymentFactory.php");
include_once(__DIR__."\..\models\CreditCardMethod.php");
include_once(__DIR__."\..\models\PaypalMethod.php");

class PaymentFactory implements IPaymentFactory {

  public function getPaymentMethod($requestedPaymentMethod) {
    if($requestedPaymentMethod == "creditCard") {
      return new CreditCardMethod();
    } else if($requestedPaymentMethod == "paypal") {
      return new PaypalMethod();
    }
    return null;
  }
}