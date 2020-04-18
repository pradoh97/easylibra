<?php
class Database{
  private $db;

  function __construct(){
    $dbConfig = Config::getConfig()['db'];
    $this -> db  = new PDO("{$dbConfig['vendor']}:host={$dbConfig['host']};port={$dbConfig['port']};dbname={$dbConfig['name']}", $dbConfig['user'], $dbConfig['password']);

    $this -> db -> exec("SET search_path TO {$dbConfig['schema']}");
  }

  public function getConnection(){
    return $this -> db;
  }
}
?>
