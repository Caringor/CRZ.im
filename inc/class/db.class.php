<?php

  class db  {

    function __construct() {
      $this->db = new PDO('sqlite:' . dirname(__FILE__) . '/database.db');
      $this->init_tab();
    }

    // 初始化数据库结构
    function init_tab() {
      // 网址表
      $this->db->exec("CREATE TABLE urls(
        id char(8) PRIMARY KEY,  
        url longtext,  
        ip varchar(16),
        ua varchar(255)
      )");
    }

    // 查询表内容
    function query($name, $rule = '') {
      $query = $this->db->prepare("SELECT * FROM $name $rule");
      $query->execute();
      $result = $query->fetchAll();
      return $result;
    }

    // 插入表内容
    function insert($tab, $key, $val) {
      $exec = $this->db->exec("INSERT INTO $tab ($key) VALUES($val)");
      if(!$exec) return false;
      $this->db->beginTransaction();
    }

    // 删除表内容
    function delete($tab, $rule = '') {
      $exec = $this->db->exec("DELETE FROM $tab $rule");
      if(!$exec) return false;
      $this->db->beginTransaction();
    }

  }

?>