<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <title>Squire's corner - Login</title>
    <link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>

    <div class="wrapper">
      <div class="container">

        <?php
          include 'header.php';
         ?>

        <div class="utility-window">
          <form class="log-form" action="login.inc.php" method="POST">
            <h3>Log in, sire!</h3>
            <br>
            <label for="uid">Username : </label>
            <input type="text" name="uid" placeholder="Username">
            <br>
            <label for="pwd">Password : </label>
            <input type="password" name="pwd" placeholder="Password">
            <br>
            <button type="submit" name="login-subm">Log In</button>
          </form>
        </div>
      </div>
      </div>

  </body>
</html>
