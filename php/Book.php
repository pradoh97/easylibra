<?php
  class Book{

    private $id;
    private $isbn;
    private $title;
    private $author;
    private $stock;
    private $price;
    private $img_uri;

    public function __construct($isbn, $title, $author, $stock, $price, $img_uri)
    {
      $this -> isbn = $isbn;
      $this -> title = "'" . $title . "'";
      $this -> author = "'" . $author . "'";

      if(!isset($this -> stock) || $this -> stock === ""){
        $this -> stock = 0;
      } else {
        $this -> stock = $stock;
      }

      if(!isset($this -> price) || $this -> price === ""){
        $this -> price = 0;
      } else {
        $this -> price = $price;
      }

      if(!isset($img_uri)){
        $this -> img_uri = Config::getPlaceholderURI();
      } else {
        $this -> img_uri = $img_uri;
      }
    }

    public function addBook($connection){
      $query = <<<SQL
        INSERT INTO book (isbn, title, author, stock, price, img_uri)
        VALUES ({$this -> isbn}, {$this -> title}, {$this -> author}, {$this -> stock}, {$this -> price}, {$this -> img_uri})
        SQL;

      $connection -> exec($query);
    }

    static function sanitizeBookFields(&$bookData){

      /*reemplazar todos las claves del array con nombre por un foreach usando los datos
       de bookField en app.json (y ver como se puede mejorar este enfoque).
       */
      $bookData['isbn'] = html_entity_decode($bookData['isbn']);
      $bookData['title'] = html_entity_decode($bookData['title']);
      $bookData['author'] = html_entity_decode($bookData['author']);
      $bookData['img_uri'] = html_entity_decode($bookData['img_uri']);
    }

    static function validateBook($bookData){
      $badFields = [];

      if (strlen($bookData['isbn']) != 13){
        $badFields['isbn'] = true;
      }

      if($bookData['title'] === ''){
        $badFields['title'] = true;
      }

      if($bookData['author'] === ''){
        $badFields['author'] = true;
      }

      if(isset($bookData['stock']) && $bookData['stock'] < 0){
        $badFields['stock'] = true;
      }

      if(isset($bookData['price']) && $bookData['price'] < 0){
        $badFields['price'] = true;
      }

      return $badFields;
    }
  }

?>
