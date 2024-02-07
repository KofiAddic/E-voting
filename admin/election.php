<?php include("header and footer/header.php") ?>

<?php include("header and footer/navigation.php") ?>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #3e3e42;

    
    
}
.voters{
    margin-top: 70px;
    margin-bottom:70px;


}

.form{
    background-color: grey;
    justify-content: center;
    align-items: center;
    color: white;
    padding : 20px;
    border-radius: 8px;
    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.5);
    text-align: center;
    width: 600px;
    height: 350px;
    margin-top: 500%;
    margin: auto;
    
}


</style>
<div class="voters">

<div class="form" >
<form action="election.php" method="post">
        <label for="LRN">Election Name:</label>
        <input type="text" id="electionname" name="electionname"><br>

        <label for="description">Description:</label>
        <input type="TEXT" id="desc" name="description" placeholder="Provide some context about your Election"><br>
        
        
        <div class="button-container"><br>
        <button type="submit" class="btn btn-active btn-success">Sumbit</button>
        </div>    
    </form>
</div>
</div>

<?php 
include ('db.php');
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $election_name = $_POST["electionname"];
        $desc = $_POST["description"];
        
    
        if($election_name == ""){
            echo "<div class='msg' ><script>alert('please fil up the fields')</script></div>";
        }
        else{
            $query = mysqli_query($conn, "select * from election where election_name = '$election_name'" );
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            echo "<div class='msg' ><script>alert('The election already exist')</script></div>";
        }else{
    
        $sql = "INSERT INTO ELECTION (ELECTION_NAME, DESCRIPTION) values (?, ?)";
        
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        if($prepareStmt){
            mysqli_stmt_bind_param($stmt,"ss",$election_name, $desc);
            mysqli_stmt_execute($stmt);
            echo "<div class='msg' ><script>alert('Added successfully')</script></div>";
        }else {
            die("something went wrong");
        }
    }   
         
        }
    
    }
    
    
    


?>






<?php include("header and footer/footer.php") ?>


