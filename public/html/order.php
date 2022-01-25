<?php

session_start();

if (!isset($_SESSION["email"])) {
  header("Location: ./login.php");
}

include_once(__DIR__ . "\..\..\controllers\ShoppingCartController.php");

$shoppingCartController = ShoppingCartController::getInstance();

$totalPrice = $shoppingCartController->getTotalItemPriceInCart();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Online Store</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Nunito&family=Questrial&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../fonts/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/order.css">

</head>

<body>
  <?php include_once(__DIR__ . '\header.php') ?>

  <!--Start order-->
  <section class="order">
    <div class="container">
      <div class="row justify-content-between">
        <!--Start filling-info-container-->
        <div class="filling-info-container col-lg-8 col-12 order-lg-1 order-2">
          <form action="../../config/RequestHandler.php" method="POST" onchange="changeForm()">
            <!--Start Address-->
            <div class="address fill-box">
              <div class="row">
                <h5 class="col"><i class="fas fa-check-circle"></i> 1. Payment methods</h5>
              </div>
              <div class="form-container active">
                <div class="form-group">
                  <input type="radio" value="paypal" name="pay_method" id="paypal" checked>
                  <label>Paypal</label>
                </div>
                <div class="form-group">
                  <input type="radio" value="creditCard" name="pay_method" id="creditCard">
                  <label>Credit card</label>
                </div>
                <div class="paypal_container">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                </div>
                <div class="creditcard_container">
                  <div class="form-group">
                    <label>Card number</label>
                    <input type="text" name="cardNumber" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>cvv</label>
                    <input type="text" name="cvv" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>card holder name</label>
                    <input type="text" name="holderName" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" name="submitPayment" class="btn btn-warning" id="address-continue" value="Confirm">
                </div>
              </div>
            </div>
            <!--End Address-->

          </form>

        </div>
        <!--End filling-info-container-->
        <!--Start cart-summary-->
        <div class="cart-summary align-self-start col-lg-3 col-12 order-lg-2 order-1">
          <div class="cart-summary-container  pl-3 pr-3  pl-lg-0 pr-lg-0  pl-xl-3 pr-xl-3">
            <div class="cart-total">
              <div class="row justify-content-between">
                <span>Total </span>
                <span class="font-weight-bold">$<?php echo $totalPrice ?></span>
              </div>
            </div>
          </div>
        </div>
        <!--End cart-summary-->
      </div>
    </div>
  </section>
  <!--End order-->

  <?php include_once(__DIR__ . '\footer.php') ?>

  <!------------------------------------------------------JavaScript------------------------------------------------------>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script src="../js/index.js"></script>
  <script src="../js/order.js"></script>
</body>

</html>