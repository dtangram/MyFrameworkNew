<?php

  class welcome extends AppController{
    public function __construct($parent){
      $this->parent=$parent;
    }

    public function index(){
      $data = array();
      $data["pagename"] = "welcome";
      $data["navigation"] = $this->parent->getNav();

      $this->parent->getView("header", $data);
      $this->parent->getView("welcome");
      $this->parent->getView("footer");
    }
  }

?>
