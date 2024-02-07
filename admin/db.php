<?php $servername = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "sslgelection";

// Create connection
$conn = mysqli_connect($servername, $username1, $password1, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>