<?php

  class profile extends AppController{
    public function __construct($parent){
      $this->parent=$parent;

      //PROTECT PAGE. PREVENT UNAUTHORIZED ACCESS TO PAGE
      if(!@$_SESSION["isLoggedIn"] || @$_SESSION["isLoggedIn"] != "1"){
        header("location:/login?msg=Not Allowed");
      }
    }

    public function index(){
      $data = array();
      $data["pagename"] = "profile";
      $data["navigation"] = $this->parent->getNav();

      $this->parent->getView("header", $data);
      $this->parent->getView("profile");
      $this->parent->getView("footer");
    }

    //LOAD AND UPDATE PHOTO OR FILE ON PAGE
    public function updatePicture(){
      if($_FILES["myFile"]["type"] == "image/jpg" || $_FILES["myFile"]["type"] == "image/jpeg"){
        if(move_uploaded_file($_FILES["myFile"]["tmp_name"], "./assets/img/myImage.jpg")){
          header("location:/profile");
        }

        else{
          echo "problem uploading";
        }
      }

      else{
        header("location:/profile?msg=Not Allowed");
      }
    }
  }

?>
