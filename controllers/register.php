<?php

  class register extends AppController{
    public function __construct($parent){
      $this->parent=$parent;
    }

    public function index(){
      $data = array();
      $data["pagename"] = "register";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      $this->parent->getView("header", $data);
      $this->parent->getView("registerForm");
      $this->parent->getView("footer");
    }

    public function registerConfirmed(){
      $data = array();
      $data["pagename"] = "registerConfirmed";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      $this->parent->getView("registerConfirmed", $data);
    }

    public function registerAction(){
      $err = array();

      if(empty($_POST["firstname"]) || $_POST["firstname"]==""){
        array_push($err, "Enter your first name");
      }

      else{
        if(!preg_match("/^[a-zA-Z ]*$/", $_POST["firstname"])){
          array_push($err, "Invalid input<br />");
        }
      }

      if(count($err) > 0){
        header("location:/register?msg=" . implode("&", $err));
      }

      else{
        header("location:/register/registerConfirmed");
      }
    }
  }

?>
