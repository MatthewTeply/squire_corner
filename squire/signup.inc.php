<?php
  session_start();

  include 'db.inc.php';

  $uid_min = 6;
  $uid_max = 20;

  $pwd_min = 4;
  $pwd_max = 40;

  $sec_uid = $_POST['uid'];
  $sec_uid = preg_replace('/\s+/', ' ', $sec_uid);

  if(empty($_POST['uid']) || empty($_POST['pwd']) || empty($_POST['em'])) {

    die("Hey! You forgot to fill out a field! Go correct that!");
  }

  else if(!ctype_alnum($_POST['uid'])) {

    die("I sense special characters in your name, are you tryin' to do somethin' fishy? Also you cannot use blank spaces in your name...");
  }

  else if(strpos($_POST['em'], '@') == false || strpos($_POST['em'], '.') == false) {

    die("The email you claim is your own is not valid!");
  }

  else if(strlen($_POST['uid']) < $uid_min || strlen($_POST['uid']) > $uid_max) {

    die("Your username is too long or too short : ".$uid_min." - ".$uid_max." characters!<br>Your username has ".strlen($_POST['uid'])." characters!");
  }

  else if(strlen($_POST['pwd']) < $pwd_min || strlen($_POST['pwd']) > $pwd_max) {

    die("Your password is too long or too short : ".$pwd_min." - ".$pwd_max." characters!<br>Your password has ".strlen($_POST['pwd'])." characters!");
  }

  else {

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $em = $_POST['em'];

    if(isset($_POST['signup-subm'])) {

      $encr_pwd = password_hash($pwd, PASSWORD_DEFAULT);
      $stmnt = $conn->prepare("INSERT INTO users (uid, pwd, em) VALUES (?, ?, ?)");
      $stmnt->bind_param("sss", $st_uid, $st_pwd, $st_em);

      $st_uid = $uid;
      $st_pwd = $encr_pwd;
      $st_em = $em;

      $stmnt->execute();
    }

    header("Location: index.php");
  }
