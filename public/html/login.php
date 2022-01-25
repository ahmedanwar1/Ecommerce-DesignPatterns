<?php

session_start();

if (isset($_SESSION["email"])) {
  // remove all session variables
  session_unset();

  // destroy the session
  session_destroy();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Online Store</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../fonts/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/login.css" />
</head>

<body>
  <!--Start preload animation-->
  <div class="preload">
    <div class="animation">
      <!--this animation is from lottiefiles.com-->
      <img src="../images/animation_300_kgnn1i7y.gif" alt="loading" />
    </div>
  </div>
  <!--End preload animation-->
  <!--Start login-->
  <div class="login">
    <div class="container">
      <h4 class="text-center">Login</h4>
      <form action="../../config/RequestHandler.php" method="POST">
        <div class="form-group">
          <input type="text" placeholder="E-mail" class="form-control email-input" name="email" />
        </div>
        <div class="form-group password-container">
          <input type="password" placeholder="Password" class="form-control password-input" name="password" />
          <i class="fas fa-eye d-none"></i>
          <i class="fas fa-eye-slash"></i>
        </div>
        <div class="form-group row">
          <div class="col-sm col-12">
            <input type="checkbox" />
            <label>Remember me</label>
          </div>
          <a href="#" class="col-sm col-12 text-sm-right text-center">Forgot your password?</a>
        </div>
        <input type="submit" value="Login" class="btn btn-warning btn-block" name="loginForm" />
      </form>
      <div class="create-link">
        <a href="signup.php">Create new account</a>
      </div>
    </div>
  </div>
  <!--End login-->
  <!------------------------------------------------------JavaScript------------------------------------------------------>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script src="../js/index.js"></script>
  <!-- <script src="../js/login.js"></script> -->

</body>

</html>