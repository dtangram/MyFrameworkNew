<?php

  class welcome extends AppController{
    public function __construct($parent){
      $this->parent=$parent;
    }

    public function index(){
      $data = array();
      $data["pagename"] = "welcome";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      $this->parent->getView("header", $data);
      $this->parent->getView("welcome");
      $this->parent->getView("footer");
    }
  }

?>
