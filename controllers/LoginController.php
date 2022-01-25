<?php
include_once(__DIR__ ."\..\models\LoginModel.php");

class LoginController {
  private $loginModel;

  public function __construct(){
    $this->loginModel = new LoginModel();
  }


  public function login($email, $password){
    $loginStatus = $this->loginModel->login($email, $password);
    return $loginStatus; // to direct user to home page or not
    
  }

}











