<?php

require_once './php/DataBase.php';
require_once './php/Config.php';
require_once './php/Book.php';

$placeHolderImg = Config::getPlaceholderURI();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $bookData = $_POST;

  $target_path = Config::getCoversPath() . $_FILES['coverImg']['name'];
  $imgUri = "'". $target_path."'";
  $bookData = $_POST;
  $bookData['imgUri'] = $imgUri;

  if(validForm($bookData)){

    $book = new Book(
      $bookData['isbn'],
      $bookData['title'],
      $bookData['author'],
      $bookData['stock'],
      $bookData['price'],
      $imgUri);

      $db = new DataBase();
      $dbConnection = $db -> getConnection();

      move_uploaded_file($_FILES['coverImg']['tmp_name'], $target_path);
      $book -> addBook($dbConnection);

      echo("uploadBook.php linea 33");
      var_dump($book);
      var_dump($dbConnection -> errorInfo()[2]);

      unset($db);
      unset($dbConnection);
  }
}

function validForm($bookData){
  if(!formCompleted()){
    return false;
  }

  $formErrors = Book::validateBook($bookData);

  if(count($formErrors)){
    return false;
  }

  return true;
}

function formCompleted():bool{
  foreach ($_POST as $key => $value) {
    if($key === 'button' || $key === 'stock' || $key === 'price' || $key === 'imgUri'){
      continue;
    }
    if(!isset($key) || empty($value)){
      return false;
    }
  }
  return true;
}
?>
