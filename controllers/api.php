<?php

  class api extends AppController{
    public function __construct($parent){
      $this->parent = $parent;
    }

    public function index(){
      $data = array();
      $data["pagename"] = "api";
      $data["navigation"] = $this->parent->getNav();

      $this->parent->getView("header", $data);
      $this->parent->getView("api");
      $this->parent->getView("footer");
    }
  }

?>
