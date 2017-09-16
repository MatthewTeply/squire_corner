<?php

session_start();

include 'db.inc.php';

  $uid = $_POST['uid'];
  $pwd = $_POST['pwd'];

  $sql = "SELECT * FROM users WHERE uid='$uid' ";
  $results = mysqli_query($conn, $sql);
  $row = $results->fetch_assoc();
  $hash_pwd = $row['pwd'];
  $hash = password_verify($pwd, $hash_pwd);

  if($hash == 0) {

    header("Location: login.php?loginfail");
    exit();
  }

  else {

    $stmnt = $conn->prepare("SELECT * FROM users WHERE uid=? AND pwd=?");
    $stmnt->bind_param('ss', $username, $password);

    $username = $uid;
    $password = $hash_pwd;

    $stmnt->execute();

    $results = $stmnt->get_result();

    $numRows = $results->num_rows;

    $row = $results->fetch_assoc();

    if(!$numRows > 0) {

      header("Location: login.php?loginfail");
    }

    else {

      $_SESSION['uid'] = $uid;
      $_SESSION['em'] = $row['em'];

      header("Location: index.php?logged");
    }
  }
