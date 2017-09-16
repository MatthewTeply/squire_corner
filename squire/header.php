<div class="header">
  <h1><a href="index.php">Squire's corner</a></h1>
  <ul>
    <?php if (!isset($_SESSION['uid'])) { echo "<li><a href='signup.php'>Sign up</a></li>"; echo "<li><a href='login.php'>Login</a></li>"; } else {
      echo "<li><a href='logout.inc.php'><font color=#6666ff>Logout</font></a></li>"; } ?>
    <li><a href="users.php">Users</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#news">News</a></li>

    <?php

    if (isset($_SESSION['uid'])) {

      echo "<li><a href='users.php?up=".$_SESSION['uid']."'><font color=#6666ff>".$_SESSION['uid']."</font></a></li>";
    }

     ?>

  </ul>
</div>
