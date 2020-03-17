<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1">
    <title>Book upload</title>
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>

    <?php include_once 'uploadBook.php' ?>

    <h1>Book upload</h1>
    <span><a href="index.php">Catalog.</a></span>
    <div class="book-card upload">
      <img src=<?php echo $placeHolderImg ?> alt="a book cover placeholder">
      <form name="book" action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="body">
          <div class="controls-set">
            <label for="coverImg">Cover image.</label>
            <button type="button" name="button" id="clearImg">Clear image.</button>
            <input type="file" accept=".jpg, .jpeg, .png" name="coverImg" id="coverImg" value="">
          </div>
          <div class="controls-set">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" placeholder="9123018514194">
          </div>
          <div class="controls-set">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="1984">
          </div>
          <div class="controls-set">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" placeholder="George Orwell">
          </div>
          <div class="controls-set">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" placeholder="4.25">
          </div>
          <div class="controls-set">
            <label for="stock">Stock</label>
            <input type="text" name="stock" id="stock" placeholder="10">
          </div>
          <div class="controls-set action">
            <button type="submit" name="button">Upload book.</button>
            <button type="reset" name="button">Clear upload.</button>
          </div>
        </div>
      </form>
    </div>
    <script type="text/javascript" src="js/upload.js"></script>
  </body>
</html>
