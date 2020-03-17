<?php

require_once 'conection.php';
require_once 'config.php';
require_once 'php/Book.php';

$placeHolderImg = getPlaceholderURI();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $bookData = $_POST;

  $target_path = getCoversPath() . $_FILES['coverImg']['name'];
  $img_uri = "'". $target_path."'";
  $bookData = $_POST;
  $bookData['img_uri'] = $img_uri;

  if(validForm($bookData)){

    $book = new Book(
      $bookData['isbn'],
      $bookData['title'],
      $bookData['author'],
      $bookData['stock'],
      $bookData['price'],
      $img_uri);

      $db = getDBConection();

      move_uploaded_file($_FILES['coverImg']['tmp_name'], $target_path);
      $book -> addBook($db);
      var_dump($book);
      var_dump($db -> errorInfo()[2]);
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
    if($key === 'button' || $key === 'stock' || $key === 'price' || $key === 'img_uri'){
      continue;
    }
    if(!isset($key) || empty($value)){
      return false;
    }
  }
  return true;
}
?>
