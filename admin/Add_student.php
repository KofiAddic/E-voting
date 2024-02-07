<?php include("header and footer/header.php") ?>

<?php include("header and footer/navigation.php") ?>


<style>
body {
    font-family: Arial, sans-serif;
    background-color: #3e3e42;

    
    
}
.voters{
    margin-top: 110px;
    margin-bottom:110px;


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
    width: 500px;
    margin-top: 500%;
    margin: auto;
    
}
</style>
<div class="voters">
<div class="form" >
<form action="add_student.php" method="post">
        <label for="LRN">LRN:</label>
        <input type="text" id="LRN" name="LRN"><br>

        <label for="FNAME">First Name:</label>
        <input type="TEXT" id="FNAME" name="FNAME"><br>
        <label for="LNAME">Last Name :</label>
        <input type="TEXT" id="LNAME" name="LNAME"><br>
        <label for="gender">Gender</label>
        <select name="gender"><br>
        <option disabled selected >What is your gender</option>
            <option value="FEMALE">Female</option>
            <option value="MALE">Male</option>
        </select><br>
        <label for="section">Section</label>
        
                    
                        <?php
                        include ('db.php');

                        $sql = mysqli_query($conn,"SELECT * From section");
                        $row = mysqli_num_rows($sql);


                            echo "<select name='section'>";
                            echo "<option disabled selected >What section</option>'";
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value='". $row['ID'] ."'>" .$row['section'] ."</option>" ;
                            }
                            echo "</select>" ;

                        ?>

               
        <br>
        <label for="password">Password :</label>
        <input type="PASSWORD" id="PASSWORD" name="PASSWORD"><br>
        
        <div class="button-container">
        <button type="submit" class="btn btn-active btn-success">Sumbit</button>
        </div>                  

    </form>
</div>
</div>

<?php 
include('db.php');


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $LRN = $_POST["LRN"];
    $FNAME = $_POST["FNAME"];
    $LNAME = $_POST["LNAME"];
    $GENDER = $_POST["gender"];
    $SECTION = $_POST["section"];
    $PASS = $_POST["PASSWORD"];

    $password = md5($PASS);
   

    if($LRN == "" || $FNAME == "" || $LNAME == "" || $PASS == "" ){
        echo "<div class='msg' ><script>alert('Please fill up the fields')</script></div>";
    }
    else{
        $query = mysqli_query($conn, "select * from voters where LRN='$LRN'" );
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
        echo "<div class='msg' ><script>alert('The student already exist')</script></div>";
    }else{

    $sql = "INSERT INTO voters (LRN, Fname, Lname, section, gender, pass) values ($LRN, '$FNAME', '$LNAME', $SECTION, '$GENDER', '$password')";
   
    if(mysqli_query($conn, $sql)){
        echo "<div class='msg' ><script>alert('Added Successfully')</script></div>"; 
      
    } else{
        echo "ERROR: Sorry $sql. ". mysqli_error($conn);
    }
}   
     
    }

}





?>




<?php include("header and footer/footer.php") ?>


