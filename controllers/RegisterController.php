<?php
include_once(__DIR__ ."\..\models\RegisterModel.php");

class RegisterController {
  private $registerModel;

  public function __construct(){
    $this->registerModel = new RegisterModel();
  }


  public function register($firstname,$lastname,$phonenumber,$address,$email,$password)
  {
    $this->registerModel->register($firstname,$lastname,$phonenumber,$address,$email,$password);
  }

}
