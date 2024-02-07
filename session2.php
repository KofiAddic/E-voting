<?php
$servername = "localhost";
$username1 = "root";
$password1 = "";
$db = "sslgelection";
$connection = mysqli_connect($servername, $username1, $password1, $db);
// Selecting Database
session_start();
// Starting Session
// Storing Session
$user_check = $_SESSION['login_user1'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($connection, "select LRN from voters where LRN='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['LRN'];
if(!isset($login_session)){
mysqli_close($connection);// Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>
