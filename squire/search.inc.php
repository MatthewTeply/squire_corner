<?php

include 'db.inc.php';

function setUsers($conn) {

  if(isset($_POST['srch-subm'])) {
    $uid = $_POST['search'];

    header("Location: users.php?us=".$uid."");
  }
}

function getUsers($conn) {

  $uid = $_GET['us'];

  $sql = "SELECT uid FROM users WHERE uid LIKE '%$uid%' ORDER BY id asc";
  $results = mysqli_query($conn, $sql);

  echo
  "
    <div class='utility-window search-res'>
    <h3 class='no-usr'>There are no lords who go by that name m'lord!</h3>
  ";

  while($row = $results->fetch_assoc()) {

      echo
      "
      <style>

        .no-usr {

          display: none;
        }

      </style>
      <a href='users.php?up=".$row['uid']."'><div class='post-window search-window'>
      <h3>".$row['uid']."</h3>
      </div></a>
      ";
  }

  echo "</div>";
}
