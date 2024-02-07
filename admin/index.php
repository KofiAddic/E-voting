<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Login System</title>
    <style>
    .msg{
        
        color: red;
    }
        body {
    font-family: Arial, sans-serif;
    background-color: #3e3e42;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.login-container {
    background-color: grey;
    color: white;
    padding : 20px;
    border-radius: 8px;
    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.5);
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
    border: none;
    border-radius: 15px;
    box-sizing: border-box;
}

button {
    background-color: #5cdb5c;
    color: #fff;
    padding: 10px 40px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}



    </style>
</head>
<body data-theme="cupcake">

<div class="login-container">
    <h2>LOG IN</h2><br>
    <form action="index.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>

        <button type="submit">Login</button>
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
     
    $pass = md5($password);

    $query = mysqli_query($conn, "select * from adminusers where password='$pass' AND username='$username'", );
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
    $_SESSION['login_user']=$username; // Initializing Session
    header("location: adminpage.php"); // Redirecting To Other Page
    } else {
    echo "<div class='msg' ><script>alert('The Username or Password you entered isn’t connected to an account. ')</script></div>";
    }
    mysqli_close($conn); // Closing Connection
    }


?>
</body>
</html>