<?php namespace App\Model;

use PDO;

class Database
{
  private static $instance = null;

  private function __construct(){}

  public static function getInstance() {
    if (is_null(self::$instance)) {
      self::$instance = new \PDO('mysql:dbname=test;host=127.0.0.1;charset=UTF8', 'root', '');
      self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$instance;
  }


}