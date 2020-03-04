<?php

require_once 'conection.php';
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  addBook();
}

function formCompleted():bool{
  foreach ($_POST as $key => $value) {
    if($key === 'button'){
      continue;
    }
    if(!isset($value) || empty($value)){
      return false;
    }
  }
  return true;
}

function addBook(){
  if(!formCompleted()){
    echo "Complete el formulario";
  }

  $book = $_POST;
  $target_path = getCoversPath() . $_FILES['coverImg']['name'];

  //Cambiar esto.
  //Agrega las comillas simples a los campos tipo string.
  $book['coverImg'] = "'". getCoversPath() . $_FILES['coverImg']['name'] . "'";
  $book['title'] = "'" . $book['title'] . "'";
  $book['author'] = "'" . $book['author'] . "'";

  $db = getDBConection();

  $query = <<<SQL
  INSERT INTO book (isbn, title, author, stock, price, img_uri)
  VALUES ({$book['isbn']}, {$book['title']}, {$book['author']}, {$book['stock']}, {$book['price']}, {$book['coverImg']})
  SQL;

  //hay que validar, si no se subió, que no mueva la imagen. Con errorinfo.
  $db -> exec($query);
  move_uploaded_file($_FILES['coverImg']['tmp_name'], $target_path);
}
?>
