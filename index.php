<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1">
    <title>Book catalog</title>
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <h1>Book catalog</h1>
    <span><a href="upload.php">Add new books.</a></span>
    <div class="grid">
      <?php include_once 'catalog.php'?>
    </div>
    <script type="text/javascript" src="js/editBook.js"></script>
  </body>
</html>
