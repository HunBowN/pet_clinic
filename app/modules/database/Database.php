<?php
class Database {

  private static $connection = false;

  function __construct()
  {
    $conf = require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/database/config.php');
   
    $this->conn = new mysqli(
      $conf['host'], 
      $conf['user'], 
      $conf['password'],
      $conf['database']
    );
if ($this->conn->connect_error) {
    die('Connect Error: ' . $this->conn->connect_error);
}
    $this->conn->set_charset($conf['charset']);
  }

  public static function getInstance()
  {
    if (!self::$connection)
    {
      self::$connection = new Database(); 
      // echo('success connection!');    
    }
    return self::$connection;
  }
}

// $db = Database::getInstance();

// $query = "SELECT * FROM products;";
// $result = $db->conn->query($query);
// print_r($result);
