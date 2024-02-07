<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="election.css">
    <title>Login System</title>
    
    <style>
    .msg{
        
        color: red;
    }
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 5 5 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 290px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>

</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="index.php" method="post">
        <label for="LRN">LRN:</label>
        <input type="text" id="lrn" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <div class="button-container">
        <button type="submit" class="submit-btn">Sumbit</button>
        </div>   
    </form>
</div>
<?php
session_start();
// Replace this with your database connection logic
$servername = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "sslgelection";

// Create connection
$conn = mysqli_connect($servername, $username1, $password1, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = sha1($password);
     
    
    $query = mysqli_query($conn, "select * from voters where pass='$password2' AND lrn ='$username'" );
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
    $_SESSION['login_user1']=$username; // Initializing Session
    header("location: votingpage.php"); // Redirecting To Other Page
    } else {
    echo "<div class='msg' ><script>alert('Check LRN and password')</script></div>";
    }
    mysqli_close($conn); // Closing Connection
    }
  

?>
</body>
</html>