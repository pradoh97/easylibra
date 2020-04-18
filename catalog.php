<?php
require_once './php/DataBase.php';
require_once './php/Config.php';

$db = new DataBase();
$dbConnection = $db -> getConnection();

$query = "SELECT * FROM book";
$books = getBooks($query, $dbConnection);

unset($db);
unset($dbConnection);

foreach($books as $book){
  showBookCard($book);
}


function getBooks($query, $connection){
  $books;

  $statement = $connection -> prepare($query);
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
