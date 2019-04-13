<?php

  class about extends AppController{
    public function __construct($parent){
      $this->parent=$parent;
    }

    public function index(){
      $data = array();
      $data["pagename"] = "about";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      $this->parent->getView("header", $data);
      $this->parent->getView("about");
      $this->parent->getView("footer");
    }
  }

?>
