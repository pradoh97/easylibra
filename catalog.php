<?php
require_once './conection.php';
require_once './config.php';

$db = getDBConection();
$query = "SELECT * FROM book";
$books = getBooks($query, $db);

foreach($books as $book){
  showBookCard($book);
}

die("");

function getBooks($query, $db){
  $books;

  $statement = $db -> prepare($query);
  $statement -> execute();

  $books = $statement -> fetchAll(PDO::FETCH_ASSOC);
  return $books;
}

function showBookCard($book){
  $price = (float) $book['price'];
  $stock = (int) $book['stock'];

  if(!$price){
    $price = "Free :)";
  } else {
    $price = '$' . $price;
  }

  if(!$stock){
    $stock = "Available soon";
  } else {
    $stock .= " left.";
  }
  $card = "
  <div class='book-card'>
    <img src='{$book['img_uri']}'>
    <div class='title'>
      <h2>{$book['title']}</h2>
      <p>{$book['author']}</p>
    </div>
    <div class='body'>
      <p>{$price}</p>
      <p>{$stock}</p>
    </div>
  </div>
  ";

  echo $card;
}
?>
