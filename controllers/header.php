<?php

  class header extends AppController{
    public function __construct($parent){
      $this->parent=$parent;
    }

    public function index(){
      $data = array();
      $data["pagename"] = "header";
      $data["navigation"] = array("home"=>"/welcome", "about"=>"/about");

      $this->parent->getView("header", $data);
      $this->parent->getView("body");
      $this->parent->getView("footer");
    }
  }

?>
