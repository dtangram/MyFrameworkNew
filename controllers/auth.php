<?php

  class auth extends AppController{
    public function __construct($parent){
      $this->parent = $parent;
    }

    public function loginAuth(){
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

      elseif($_REQUEST["email"] && $_REQUEST["password"]){
        $dataSQL = $this->parent->getModel("users")->select("select id, email from users where email = :email and password = :password", array(":email"=>$_REQUEST["email"], ":password"=>sha1($_REQUEST["password"])));

        if($dataSQL){
          $_SESSION["isLoggedIn"] = 1;
          $_SESSION["userEmail"] = $_POST["email"];
          header("location:/profile");
        }

        else{
          $_SESSION["isLoggedIn"] = "0";
          $_SESSION["userEmail"] = "";
          header("location:/login?msg=Invalid User Login");
        }
      }
    }
  }

?>
