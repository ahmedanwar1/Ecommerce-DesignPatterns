<?php
session_start();

if (!isset($_SESSION["email"])) {
  header("Location: ./login.php");
}

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
  <link rel="stylesheet" href="../css/order_confirm.css">

</head>

<body>
  <?php include_once(__DIR__ . '\header.php') ?>

  <section class="order-confirm">
    <div class="container-lg">
      <h3 class="font-weight-bold text-center m-5">
        <i class="fas fa-check" style="color: chartreuse;"></i>
        <span>Your Order Is Confirmed</span>
      </h3>

    </div>
  </section>

  <section class="order-details">
    <div class="container">
      <a href="./history.php" class="btn btn-warning btn-block mt-5 mb-5">Go to History page</a>
    </div>
  </section>
  <?php include_once(__DIR__ . '\footer.php') ?>

  <!------------------------------------------------------JavaScript------------------------------------------------------>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script src="../js/index.js"></script>
  <script src="../js/order_confirm.js"></script>
</body>

</html>