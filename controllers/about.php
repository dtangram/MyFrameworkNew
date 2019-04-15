<?php

  class about extends AppController{
    public function __construct($parent){
      $this->parent=$parent;
    }

    public function index(){
      $data = array();
      $data["pagename"] = "about";
      $data["navigation"] = $this->parent->getNav();

      $this->parent->getView("header", $data);
      $this->parent->getView("about");
      $this->parent->getView("footer");
    }
  }

?>
