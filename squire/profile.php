<?php

session_start();
include 'db.inc.php';

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Squire's corner - <?php echo $_SESSION['uid']; ?></title>
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

      echo
      "
      <div class='profile-window user-info-image'>
      <img src='https://images.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.efQ1Hui4V_n-Cx_GlAMhpwEWEs%26pid%3D15.1&f=1' width=10% height=10% />
        <div class='user-info-name'>
          <h3>".$_SESSION['uid']."</h3>
          <p>".$_SESSION['em']."</h3>
        </div>
      </div>
      ";

      echo "
      <div class='utility-window'>
      <h2>Post a message m'lord!</h2>
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
