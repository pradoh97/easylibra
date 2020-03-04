<?php
function getDBConection(){
  $dbConfig =   getConfig()['db'];

  $db  = new PDO("{$dbConfig['vendor']}:host={$dbConfig['host']};port={$dbConfig['port']};dbname={$dbConfig['name']}", $dbConfig['user'], $dbConfig['password']);

  $db -> exec("SET search_path TO {$dbConfig['schema']}");

  return $db;
}
?>
