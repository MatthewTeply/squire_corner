<script type="text/javascript" src="editor/textEditor.js"></script>
<?php

include 'db.inc.php';

function setPosts($conn) {

  if (isset($_SESSION['uid'])) {

    if(isset($_POST['post-subm'])) {

      $reset = "ALTER TABLE posts AUTO_INCREMENT = 1";
      $resetRes = mysqli_query($conn, $reset);

      $title = $_POST['title'];
      $descr = $_POST['descr'];
      $content = $_POST['content'];
      $uid = $_SESSION['uid'];
      $pDate = date('Y-m-d H:i:s');

      $stmnt = $conn->prepare("INSERT INTO posts (title, descr, content, pDate, uid) VALUES (?, ?, ?, ?, ?)");
      $stmnt->bind_param("sssss", $st_title, $st_descr, $st_content, $st_pDate, $st_uid);

      $st_title = htmlspecialchars($title);
      $st_descr = htmlspecialchars($descr);
      $st_content = $content;
      $st_pDate = htmlspecialchars($pDate);
      $st_uid = htmlspecialchars($uid);

      $stmnt->execute();

      $results = $stmnt->get_result();

      header("Location: index.php?posted");
    }

  }

  else {

    exit("You are not logged in!");
  }
}

function getPosts($conn) {

  $sql = "SELECT * FROM posts WHERE mid=0 ORDER BY pid desc";
  $results = mysqli_query($conn, $sql);

  while($row = $results->fetch_assoc()) {

    $postCol;

    if($row['pid'] % 2 == 0) {

      $postCol = "even";
    }

    else {

      $postCol = "odd";
    }

    echo "
    <a href='index.php?p=".$row['pid']."' class='post-window post-window-".$postCol."'>
    <div>
      <h3>".$row['title']."</h3>
      <ul>
        <li><p>".$row['descr']."</li>
        <li class='poster'><p> Posted by : ".$row['uid']." ( ".$row['pDate']." )</li>
      <ul>
    </div></a>
    ";
  }
}

function getPage($conn) {

  $pageNo = $_GET['p'];

  $sql = "SELECT * FROM posts WHERE pid=$pageNo";
  $results = mysqli_query($conn, $sql);

  while($row = $results->fetch_assoc()) {

    echo
    "
    <div class='page-window'>
      <p><a href='index.php'>.. /</a><i>Posted by : ".$row['uid']." ( ".$row['pDate']." )</i></p>
      <br><br>
      <div class='reply-title-window'><h3>".$row['title']."</h3></div>
      <div class='reply-content-window'><p>".$row['content']."</p></div>
    </div>
    <div class='divider'></div>
    ";

    if(isset($_SESSION['uid'])) {

      echo
      "
      <div class='wrapper'>
      <div class='reply-editor-window'>
      <h2>Please reply m'lord!</h2>
      <form class='posts-form' action='".setReply($conn)."' method='POST'>
      <input type='hidden' name='mid' value='".$row['pid']."'>
      <input type='hidden' name='mtitle' value='".$row['title']."'>
      <input type='hidden' name='content'>
      ";

      include 'editor/index.php';

      echo "
      <br>
      <button type='submit' name='reply-subm' onclick='passText()'>Reply</button>
      </form>
      </div>
      </div>
      ";
    }

    echo
    "
    <h3 class='dText'>Here are all the replies, m'lord! : </h3>
    <br>
    ";

    getReply($conn);
  }
}

function setReply($conn) {

if(isset($_SESSION['uid'])) {

  if(isset($_POST['reply-subm'])) {

    $mid = $_POST['mid'];
    $title = $_POST['mtitle'];
    $content = $_POST['content'];
    $uid = $_SESSION['uid'];
    $rDate = date('Y-m-d H:i:s');

    $stmnt = $conn->prepare("INSERT INTO replies (title, content, rDate, uid, mid) VALUES (?, ?, ?, ?, ?)");
    $stmnt->bind_param("sssss", $st_title, $st_content, $st_rDate, $st_uid, $st_mid);

    $st_title = htmlspecialchars($title);
    $st_content = $content;
    $st_rDate = htmlspecialchars($rDate);
    $st_uid = htmlspecialchars($uid);
    $st_mid = htmlspecialchars($mid);

    $stmnt->execute();

    $results = $stmnt->get_result();

    }
  }
}

function getReply($conn) {

  $pageNo = $_GET['p'];

  $sql = "SELECT * FROM replies WHERE mid=$pageNo";
  $results = mysqli_query($conn, $sql);

  while($row = $results->fetch_assoc()) {

    echo "
    <div class='reply-window'>
    <div class='page-window'>
      <div class='reply-title-window reply-spacer'><h3> Re : ".$row['title']."</h3></div>
      <div class='reply-content-window'><ul>
        <li><p>".$row['content']."</li>
        <li class='reply-poster'><p> Posted by : ".$row['uid']." ( ".$row['rDate']." )</li>
      <ul></div>
    </div>
    </div>
    ";
  }
}
