<?php

  class crud extends AppController{
    public function __construct($parent){
      $this->parent=$parent;

      //PROTECT PAGE. PREVENT UNAUTHORIZED ACCESS TO PAGE
      if(!@$_SESSION["isLoggedIn"] || @$_SESSION["isLoggedIn"] != "1"){
        header("location:/login?msg=Not Allowed");
      }
    }

    public function index(){
      $data = array();
      $data["pagename"] = "crud";
      $data["navigation"] = $this->parent->getNav();

      $sql = "select * from fruit_table";
      $data["fruit"] = $this->parent->getModel("fruit")->select($sql);

      $this->parent->getView("header", $data);
      $this->parent->getView("crud", $data);
      $this->parent->getView("footer");
    }

    // INSERT INTO DATABASE
    public function addForm(){
      $data = array();
      $data["pagename"] = "crud";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "api"=>"/api");

      $this->parent->getView("addForm", $data);
    }

    public function addAction(){
      $sql = "insert into fruit_table (name) values (:name)";
      $data["fruit"] = $this->parent->getModel("fruit")->insert($sql, array(":name"=>$_REQUEST["name"]));

      header("location:/crud");
    }

    // DELETE FROM DATABASE
    public function deleteFunc(){
      $sql = "delete from fruit_table where id = :id";
      $data["fruit"] = $this->parent->getModel("fruit")->delete($sql, array(":id"=>$_GET["deletLink"]));

      header("location:/crud");
    }

    // UPADTE DATABASE
    public function updateForm(){
      $data = array();
      $data["pagename"] = "crud";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "api"=>"/api");

      // SELECT ALL THE IDs FROM THE TABLE SO THAT THEY ARE AVAILABLE FOR updateAction()
      $sql = "select * from fruit_table where id = :id";
      $data["fruit"] = $this->parent->getModel("fruit")->select($sql, array(":id"=>$_GET["upDaLink"]));

      $this->parent->getView("updateForm", $data);
    }

    public function updateAction(){
      $sql = "update fruit_table set name = :name where id = :id";
      $data["fruit"] = $this->parent->getModel("fruit")->update($sql, array(":name"=>$_REQUEST["name"], ":id"=>$_REQUEST["id"]));

      header("location:/crud");
    }
  }

?>
