<?php

  session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <title>Squire's corner - Search</title>
      <link rel="stylesheet" href="CSS/style.css">
      <link rel="stylesheet" href="editor/editor.css">
  </head>
  <body>

    <div class="wrapper">
      <div class="container">

        <?php

        include 'header.php';
        include 'search.inc.php';
        include 'users.inc.php';

        if(!isset($_GET['up'])) {

          echo
          '
          <div class="utility-window">
          <h3>Search for users!</h3>
          <br>
          <form class="" action="'.setUsers($conn).'" method="POST">
          <input type="text" name="search" placeholder="Username/E-mail">
          <button type="submit" name="srch-subm">Search</button>
          </form>
          <i><b>Pro tip :</b> Click the search button when the search field is empty to display all the users!</i>
          </div>
          ';

          if(isset($_GET['us'])) {

            getUsers($conn);
          }
        }

        else {

          getProfile($conn);
        }

         ?>



      </div>
    </div>

  </body>
</html>
