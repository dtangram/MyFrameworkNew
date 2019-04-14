<?php

  class register extends AppController{
    public function __construct($parent){
      $this->parent=$parent;
    }

    public function index(){
      $data = array();

      $data["pagename"] = "register";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      // RANDOMLY DISPLAY THE LINES AND ALPHANUMERIC CHARACTERS, WHICH WILL CHANGE EVERY TIME THE PAGE RELOADS
      $random = substr( md5(rand()), 0, 7);
      // ASSIGN THE DATA ASSOCIATIVE ARRAY TO THE VARIABLE THAT RANDOMLY DISPLAYS THE CHARACTERS
      $data["cap"] = $random;
      // ASSIGN THE CAPTCHA SESSION THAT WAS PASSED AS AN ARGUMENT IN THE create_image METHOD TO THE DATA ARRAY
      $_SESSION["captchaInput"] = $data["cap"];

      $this->parent->getView("header",$data);
      $this->parent->getView("registerForm",$data);
      $this->parent->getView("footer");
    }

    public function registerConfirmed(){
      $data = array();
      $data["pagename"] = "register";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      $this->parent->getView("registerConfirmed", $data);
    }

    public function registerAction(){
      $err = array();

      // CHECK TO SEE IF THE CAPTCHA ENTERED DOESN'T MATCH THE CAPTCHA STORED IN THE SESSION AND THE CAPTCHA INPUT FIELD IS NOT BLANK
      if(@$_POST["usercaptcha"] != @$_SESSION["captchaInput"] && @$_POST["usercaptcha"] != ""){
        // IF CAPTCHA ENTERED DOESN'T MATCH THE CAPTCHA STORED, END SESSION, CLEAR CAPTCHA FIELD & DISPLAY ERROR MESSAGE
        $_SESSION["captchaInput"] = "0";
        $_POST["usercaptcha"] = "";
        array_push($err, "Captcha Incorrect");
        // THEN LEAVE USER ON REGISTER PAGE TO PROPERLY AUTHENTICATE
        header("location:/register");
      }

      // CHECK TO SEE IF THE CAPTCHA INPUT FIELD IS BLANK
      if(empty($_POST["usercaptcha"]) || @$_POST["usercaptcha"] == ""){
        // IF THE CAPTCHA INPUT FIELD IS BLANK, END SESSION, CLEAR CAPTCHA FIELD & DISPLAY ERROR MESSAGE
        $_SESSION["captchaInput"] = "0";
        $_POST["usercaptcha"] = "";
        array_push($err, "Captcha cannot be blank");
        // THEN LEAVE USER ON REGISTER PAGE TO PROPERLY AUTHENTICATE
        header("location:/register");
      }

      // CHECK TO SEE IF THE NAME INPUT FIELDS ARE BLANK
      if(empty($_POST["firstname"]) || $_POST["firstname"] == "" || empty($_POST["lastname"]) || $_POST["lastname"] == ""){
        array_push($err, "Name does not exist");
        header("location:/register?msg=Name does not exist");
      }

      else{
        // IF THE CHARACTERS IN THE NAME INPUTS ARE NOT ONLY ALPHABETS, DISPLAY ERROR
        if(!preg_match("/^[a-zA-Z ]*$/", $_POST["firstname"]) || !preg_match("/^[a-zA-Z ]*$/", $_POST["lastname"])){
          array_push($err, "Incorrect input");
        }

        // IF THERE ARE ANY ERRORS, DISPLAY THEM
        if(count($err)>0){
          header("location:/register?msg=" . implode("&", $err));
        }

        // IF THE USER AUTHENTICATES, STORE THE SESSION AND ASSIGN THE SESSION TO THE CAPTCHA ENTERED
        elseif(@$_POST["usercaptcha"] == @$_SESSION["captchaInput"]){
          $_SESSION["captchaInput"] = "1";
          $_SESSION["captchaInput"] = $_POST["usercaptcha"];
          // SEND THE USER TO THE RESTRICTED SITE
          header("location:/register/registerConfirmed");
        }
      }
    }
  }

?>
