<?php

namespace App\Models;

class Model
{
  protected $db;
  function __construct()
  {
    $db = new \PDO('mysql:host=127.0.0.1;dbname=db_online', 'root', ''); 
    $this->db = $db;
  }
  /**
   * get
   */
  
  public  function get($table)
  {
    $this->db->query("SELECT * FROM {$table}");

  }
}
