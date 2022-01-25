<?php
session_start();

if (!isset($_SESSION["email"])) {
  header("Location: ./login.php");
}
include_once(__DIR__ . "\..\..\controllers\OrderController.php");

$orderController = new OrderController();

$results = $orderController->getAllOrders();
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


  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Order id</th>
        <th scope="col">Order time</th>
        <th scope="col">order total</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($results) {
        while ($rows = mysqli_fetch_array($results)) { ?>
          <tr>
            <th scope="row"><?php echo $rows["id"]; ?></th>
            <td><?php echo $rows["order_time"]; ?></td>
            <td><?php echo $rows["order_total"]; ?></td>
          </tr>
      <?php }
      } ?>
    </tbody>
  </table>

  <?php include_once(__DIR__ . '\footer.php') ?>

  <!------------------------------------------------------JavaScript------------------------------------------------------>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script src="../js/index.js"></script>
  <script src="../js/order_confirm.js"></script>
</body>

</html>