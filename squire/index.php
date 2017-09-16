<?php

  session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <title>Squire's corner</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="editor/editor.css">
  </head>
  <body>

    <div class="wrapper">
      <div class="container">
        <?php include 'header.php'; ?>
        <div class="content">

          <?php

          include 'posts.inc.php';
          include 'db.inc.php';

          if (isset($_GET['p'])) {

            getPage($conn);
          }

          else {

            getPosts($conn);
          }

           ?>

        </div>
      </div>
    </div>

  </body>
</html>
