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
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/signup.css" />
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

  <!--Start signup-->
  <div class="signup">
    <div class="container">
      <h4 class="text-center">SignUp</h4>
      <form action="register.php" method="POST">
        <div class="form-group">
          <input type="text" placeholder="First Name" class="form-control" id="firstname-input" name="firstname" />
        </div>
        <div class="form-group">
          <input type="text" placeholder="Last Name" class="form-control" id="lastname-input" name="lastname" />
        </div>
        <div class="form-group">
          <input type="text" placeholder="Phone Number" class="form-control" id="phonenumber-input" name="phonenumber" />
        </div>
        <div class="form-group">
          <input type="text" placeholder="Address" class="form-control" id="address-input" name="address" />
        </div>
        <div class="form-group">
          <input type="email" placeholder="E-mail" class="form-control" id="email-input" name="email" />
        </div>
        <div class="form-group password-container">
          <input type="password" placeholder="Password" class="form-control" id="password-input" name="password" />
          <i class="fas fa-eye d-none"></i>
          <i class="fas fa-eye-slash"></i>
        </div>
        <div class="form-group">
          <input type="checkbox" id="checkbox-submit" />
          <label>I accept the Terms & Conditions</label>
        </div>
        <input type="submit" value="Create Account" id="submit-btn" class="btn btn-warning btn-block" name="registerForm" />
      </form>
      <div class="create-link">
        <p>Already have an account?</p>
        <a href="login.php">LOGIN</a>
      </div>
    </div>
  </div>
  <!--End signup-->

  <!------------------------------------------------------JavaScript------------------------------------------------------>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script src="../js/index.js"></script>
  <script src="../js/signup.js"></script>
</body>

</html>