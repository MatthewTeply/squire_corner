<?php

session_start();
include 'db.inc.php';

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Squire's corner - Admin</title>
    <link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>

    <div class="wrapper">
      <div class="container">
        <div class="header">
          <h1><a href="index.php">Squire's corner</a></h1>
          <ul>

            <?php

            if (isset($_SESSION['uid'])) {

              echo "<li><a href='logout.inc.php'><font color=orange>Log out</font></a></li>";
            }

             ?>

          </ul>
        </div>

    <?php

    include 'posts.inc.php';

    if(!isset($_SESSION['uid'])) {

      echo
      "
      <div class='container'>
      <h1>You are not logged in!</h1>
      </div>
      ";
    }

    else {

      echo "
      <div class='utility-window'>
      <h2>Please type a message m'lord!</h2>
      <form class='posts-form' action='".setPosts($conn)."' method='POST'>
      <input type='text' name='title' placeholder='Title' maxlength='80'>
      <br>
      <input type='text' name='descr' placeholder='Description' maxlength='140'>
      <br>
      <textarea name='content' placeholder='Content'></textarea>
      <br>
      <button type='submit' name='post-subm'>Post</button>
      </form>
      </div>
      ";
    }

    ?>

    </div>
  </div>

  </body>
</html>
