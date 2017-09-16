<?php

$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "sc";

$conn = mysqli_connect('localhost', 'root', '', 'sc');

if(!$conn) {

  die("Mysql error : ".mysqli_connect_error());
}
