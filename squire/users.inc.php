<script type="text/javascript" src="editor/textEditor.js"></script>
<?php

function getProfile($conn) {

  include 'posts.inc.php';

  $usrName = $_GET['up'];

  $sql = "SELECT uid, em FROM users WHERE uid='$usrName'";
  $results = mysqli_query($conn, $sql);

  while($row = $results->fetch_assoc()) {

    echo
    "
    <div class='profile-window user-info-image'>
    <img src='https://images.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.efQ1Hui4V_n-Cx_GlAMhpwEWEs%26pid%3D15.1&f=1' width=10% height=10% />
      <div class='user-info-name'>
        <h3>".$row['uid']."</h3>
        <p>".$row['em']."</h3>
      </div>
    </div>
    ";

    if ($row['uid'] == $_SESSION['uid']) {

      echo "
      <div class='utility-window'>
      <h2>Post a message m'lord!</h2>
      <form class='posts-form' action='".setPosts($conn)."' method='POST'>
      <input type='text' name='title' placeholder='Title' maxlength='80'>
      <br>
      <input type='text' name='descr' placeholder='Description' maxlength='140'>
      <br>
      <input type='hidden' id='content' name='content' placeholder='Content'>";

      include 'editor/index.php';

      echo "<br>
      <button type='submit' name='post-subm' onclick='passText()'>Post</button>
      </form>
      </div>
      ";

    }
  }
}

?>
