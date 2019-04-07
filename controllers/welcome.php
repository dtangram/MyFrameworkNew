<?php

class welcome extends AppController{
  public function __construct($parent){
    $this->parent=$parent;

    $data = array();
    $data["pagename"] = "welcome";
    $data["navigation"] = array("welcome"=>"/welcome", "home"=>"/welcome/header");
    $this->parent->getView("welcome", $data);
  }

  public function header(){
    $data = array();
    $data["pagename"] = "header";
    $data["navigation"] = array("welcome"=>"/welcome", "home"=>"/welcome/header");

    $this->parent->getView("header", $data);
    $this->parent->getView("body");
    $this->parent->getView("footer");
  }
}

?>
