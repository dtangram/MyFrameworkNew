<?php

  class login extends AppController{
    public function __construct($parent){
      $this->parent=$parent;
    }

    public function index(){
      $data = array();
      $data["pagename"] = "login";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      $this->parent->getView("header", $data);
      $this->parent->getView("loginForms");
      $this->parent->getView("footer");
    }

    public function receive(){
      if($_POST["type"] == "form"){
        $this->receiveReq();
      }

      else{
        $this->receiveAjax();
      }
    }

    public function receiveReq(){
      // CREATE AN ASSOCIATIVE ARRAY VARIABLE TO STORE ERROR MESSAGES
      $err = array();
      $salary = $_POST["salary"];
      $male = $_POST["male"];
      $female = $_POST["female"];
      $textareaInfo = $_POST["textareaInfo"];

      if(empty($_POST["email"]) || $_POST["email"]==""){
        // USE array_push METHOD TO STORE THE STRING IN THE ARRAY
        array_push($err, "Enter your email address");
      }
      // IF THE REGULAR EXPRESSION PATTERN AND EMAIL ENTERED DOESN'T MATCH, DISPLAY ERROR MESSAGE
      if(!preg_match("/^[a-zA-Z0-9_+.-]+\@([a-zA-Z0-9-]+\.)+[a-zA-Z0-9]{2,7}$/i", $_POST["email"])){
        array_push($err, "Invalid email address");
      }

      // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      //   array_push($err, "Invalid email address<br />");
      // }

      if(empty($_POST["password"]) || $_POST["password"] == ""){
        array_push($err, "Password input field cannot be blank");
      }

      if(empty($_POST["male"]) && empty($_POST["female"])){
        array_push($err, "Check a gender");
      }

      if($salary == "Salary"){
        array_push($err, "Please select a salary");
      }

      // COUNT THE ERROR MESSAGES AND DISPLAY THE APPROPRIATE MESSAGE
      if(count($err) > 0){
        header("location:/login?msg=" . implode("&", $err));
      }

      elseif($_POST["email"] == "dtangram@yahoo.com" && $_POST["password"] == 1234){
        if($male){
          header("location:/login?msg=Good Login<br />" . $male . "<br />" . $salary . "<br />" . $textareaInfo);
        }

        else{
          header("location:/login?msg=Good Login<br />" . $female . "<br />" . $salary . "<br />" . $textareaInfo);
        }

      }

      else{
        header("location:/login?msg=Bad Login");
      }
    }

    public function receiveAjax(){
      if($_POST["email"] == "dtangram@yahoo.com" && $_POST["password"] == 1234){
        echo "Good";
      }

      else{
        echo "Bad";
      }
    }
  }

?>
