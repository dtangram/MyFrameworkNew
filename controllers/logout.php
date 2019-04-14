<?php

  class logout extends AppController{
    public function __construct($parent){
      $_SESSION["isLoggedIn"] = "0";
      session_destroy();
      header("location:login");
    }
  }

?>
