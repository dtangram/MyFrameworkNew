<?php

  class users{
    public function __construct($parent){
      $this->parent = $parent;
    }

    public function select($sql, $val = array()){
      $this->sql = $this->parent->db->prepare($sql);
      $result = $this->sql->execute($val);

      $data = $this->sql->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }

    public function insert($sql, $val = array()){
      $this->sql = $this->parent->db->prepare($sql);
      $result = $this->sql->execute($val);
    }

    public function delete($sql, $val = array()){
      $this->sql = $this->parent->db->prepare($sql);
      $result = $this->sql->execute($val);
    }

    public function update($sql, $val = array()){
      $this->sql = $this->parent->db->prepare($sql);
      $result = $this->sql->execute($val);
    }
  }

?>
