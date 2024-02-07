<?php include ('header and footer/header.php'); ?>


<?php include ('header and footer/navigation.php'); ?>

<style>

body {
    font-family: Arial, sans-serif;
    background-color:#3e3e42;

    
    
}
.voters{
    margin-top: 195px;
    margin-bottom:195px;

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
    width: 290px;
    margin-top: 500%;
    margin: auto;
    
}
</style>
<div class="voters">
<div class="form" >
<form action="ADD_PARTYLIST.php" method="post">

        <label for="FNAME">Party Name:</label>
        <input type="TEXT" id="partyname" name="partyname"><br>
        
        <div class="button-container">
        <button type="submit" id="" class="btn btn-active btn-success">Sumbit</button>
        </div>
    </form>
</div>
</div>


<?php 
include ('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $partyname = $_POST["partyname"];
    

    if($partyname == ""){
        echo "<div class='msg' ><script>alert('please fil up the fields')</script></div>";
    }
    else{
        $query = mysqli_query($conn, "select * from partylist where partyname='$partyname'" );
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
        echo "<div class='msg' ><script>alert('The partylist already exist')</script></div>";
    }else{

    $sql = "INSERT INTO partylist (partyname) values (?)";
    
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
    if($prepareStmt){
        mysqli_stmt_bind_param($stmt,"s",$partyname);
        mysqli_stmt_execute($stmt);
        echo "<div class='msg' ><script>alert('Added successfully')</script></div>";
    }else {
        die("something went wrong");
    }
}   
     
} 
}

?>




<?php include ('header and footer/footer.php'); ?>