<?php
session_start();

if (!isset($_SESSION["email"])) {
  header("Location: ./login.php");
}
include_once(__DIR__ . "\..\..\controllers\ShoppingCartController.php");


$shoppingCartController = ShoppingCartController::getInstance();

$results = $shoppingCartController->getAllItems();

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
  <link rel="stylesheet" href="../css/cart.css">

</head>

<body>

  <?php include_once(__DIR__ . '\header.php') ?>

  <!--Start shopping cart-->
  <section class="shopping-cart">
    <div class="container">
      <div class="row justify-content-between">
        <!--Start cart items container-->
        <div class="cart-items col-lg-8 col-12 order-lg-1 order-2">
          <h4>Shopping Cart</h4>
          <!--cart item 1-->
          <?php if ($results) {
            while ($rows = mysqli_fetch_array($results)) { ?>
              <div class="cart-item">
                <div class="row justify-content-md-between justify-content-start">
                  <div class="item-image col-md-2 col-4">
                    <?php echo '<img src="' . $rows["img"] . '" alt="item">';
                    ?>
                  </div>
                  <div class="details col-md-5 col-8">
                    <div class="name">
                      <?php echo $rows["name"]; ?>
                    </div>
                    <div class="price">
                      <span class="current-price">$<?php echo $rows["price"]; ?></span>
                    </div>
                  </div>
                  <div class="operations col-md-5 col-12 mt-5 mt-md-0">
                    <div class="row justify-content-between">
                      <div class="quantity col-md col-3">
                        <input type="number" class="form-control" value="<?php echo $rows["quantity"]; ?>" disabled>
                      </div>
                      <div class="total-price text-center text-md-left col-md col-4 ">$<?php echo $rows["price"] * $rows["quantity"]; ?></div>
                      <a href="../../config/RequestHandler.php?deleteItem=<?php echo $rows["item_id"]; ?>">
                        <div class="remove-item col-md-2 col-2">

                          <i class="fas fa-trash"></i>

                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
          <?php }
          } ?>
          <a href="#" class="btn btn-warning mt-4 mb-4">Continue Shopping</a>
        </div>
        <!--End cart items container-->
        <!--Start cart summary-->
        <div class="cart-summary align-self-start col-lg-3 col-12 order-lg-2 order-1">
          <div class="cart-summary-container  pl-3 pr-3  pl-lg-0 pr-lg-0  pl-xl-3 pr-xl-3">

            <div class="cart-summary-container  pl-3 pr-3  pl-lg-0 pr-lg-0  pl-xl-3 pr-xl-3">
              <div class="cart-total">
                <div class="row justify-content-between">
                  <span>Total </span>
                  <span class="font-weight-bold">$<?php echo $totalPrice ?></span>
                </div>
              </div>
            </div>
            <hr>
            <?php if ($results) { ?>
              <div class="checkout">
                <a href="./order.php">
                  <button class="btn btn-warning btn-block">Proceed to checkout</button>
                </a>
              </div>
            <?php } ?>
          </div>
          <!--End cart summary-->
        </div>
      </div>
  </section>
  <!--End shopping cart-->

  <?php include_once(__DIR__ . '\footer.php') ?>

  <!------------------------------------------------------JavaScript------------------------------------------------------>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script src="../js/index.js"></script>
  <script src="../js/cart.js"></script>
</body>

</html>