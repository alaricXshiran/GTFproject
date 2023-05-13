<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gtf";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  echo("Connection failed: ");
}

?>