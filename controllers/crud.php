<?php

  class crud extends AppController{
    public function __construct($parent){
      $this->parent=$parent;

      if(!@$_SESSION["isLoggedIn"] || @$_SESSION["isLoggedIn"] != "1"){
        header("location:/login?msg=Not Allowed");
      }
    }

    public function index(){
      $data = array();
      $data["pagename"] = "crud";
      $data["navigation"] = $this->parent->getNav();

      $this->parent->getView("header", $data);
      $this->parent->getView("crud");
      $this->parent->getView("footer");
    }
  }

?>
