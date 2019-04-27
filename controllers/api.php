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
      $data = $this->parent->getModel("apiModel")->youtubeFunc();
      $this->parent->getView("api", $data);
      $this->parent->getView("footer");
    }
  }

?>
