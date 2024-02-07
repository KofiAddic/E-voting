<?php include("header and footer/header.php") ?>

<?php include("header and footer/navigation.php") ?>

<style>
            body {
    font-family: Arial, sans-serif;
    background-color: #3e3e42;

    
    
}
.voters{
    margin-top: 141px;
    margin-bottom:141px;


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

<div class="voters" >

    <div class="form">

<form action="add_candidates.php" method="post" enctype="multipart/form-data">
        <label for="LRN">LRN:</label>
        <input type="text" id="LRN" name="LRN"><br>

        <label for="position">Position:</label>
        <?php
                        include ('db.php');

                        $sql = mysqli_query($conn,"SELECT * From postition");
                        $row = mysqli_num_rows($sql);


                            echo "<select name='position'>";
                            echo "<option disabled selected >Select Position</option>'";
                            while ($row = mysqli_fetch_array($sql)){
                                echo " <option value='". $row['id'] ."'>" .$row['position'] ."</option>" ;
                            }
                            echo "</select>" ;
                            
                        ?>
        <br>
        <label for="PARTYLIST">Party List:</label>
        <?php
                        include ('db.php');

                        $sql = mysqli_query($conn,"SELECT * From partylist");
                        $row = mysqli_num_rows($sql);


                            echo "<select name='partylist'>";
                            echo "<option disabled selected >Select Partylist</option>'";
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value='". $row['ID'] ."'>" .$row['PARTYNAME'] ."</option>" ;
                            }
                            echo "</select>" ;
                            
                        ?>
           
        
        <br>
        
         
        <input type="file" id="fileToUpload" name="fileToUpload" class="file-input file-input-bordered w-full max-w-xs"><br>
        <div class="button-container">
        <button type="submit" id="" class="btn btn-active btn-success">Sumbit</button>
        </div>
</form>
</div>
</div>



<?php 
error_reporting(0);
include('db.php'); 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $LRN = $_POST["LRN"];
    $position = $_POST["position"];
    $partylist = $_POST["partylist"];
    $target_file =  $_FILES["fileToUpload"]["name"];
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



 
   

    if($LRN == ""){
        echo "<div class='msg' ><script>alert('please fil up the fields')</script></div>";
    }else{  

        if($imageFileType === "jpg" || $imageFileType === "png" || $imageFileType === "jpeg"
        || $imageFileType === "gif" ) {

            $query = mysqli_query($conn, "SELECT LRN FROM voters WHERE LRN = $LRN");

            if (mysqli_num_rows($query) != 0)
            {
                $sql = "INSERT INTO candidates  VALUES ( '','$LRN', '$position','$partylist','$target_file')";
         
                if(mysqli_query($conn, $sql)){
                    echo "<div class='msg' ><script>alert('Added Successfully')</script></div>"; 
         
                
                } else{
                    echo "ERROR: Sorry $sql. ". mysqli_error($conn);
                }
        
                }else{
                    echo"<div class='msg' ><script>alert('student doesn't exist')</script></div>";
                
            }
        }

            else
            {
                echo"<div class='msg' ><script>alert('Please select image format')</script></div>";
             }
   
           

}
  }

 
  ?>




<?php include("header and footer/footer.php") ?>


