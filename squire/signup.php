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
          <form class="log-form" action="signup.inc.php" method="POST">
            <h3>Welcome m'lord, please sign up!</h3>
            <br>
            <label for="em">E-Address : </label>
            <input type="text" name="em" value="@">
            <br>
            <label for="uid">Username : </label>
            <input type="text" name="uid" placeholder="Username" title="Your username has to be 6 to 20 characters long!">
            <br>
            <label for="pwd">Password : </label>
            <input type="password" name="pwd" placeholder="Password" title="Your password has to be 4 to 40 characters long!">
            <br>
            <button type="submit" name="signup-subm">Sign up</button>
          </form>
        </div>
      </div>
      </div>

  </body>
</html>
