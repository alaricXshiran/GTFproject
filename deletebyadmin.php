<?php   
include 'dbconn.php';  
if (isset($_POST)) {  

     $idx = $_POST['del'];  
     $query = "DELETE FROM images WHERE id='$idx'";  
     $query_run = mysqli_query($conn,$query);  
     if ($query_run) {
        echo'<script> alert("Delete Sucessfull"); </script>';  
        header("location:adminhome.php");
     }else{  
        echo'<script> alert("Delete Unsucessfull"); </script>';  
     }  
}  
else{
    echo'<script> alert("Something went wrong"); </script>';
    header("location:adminhome.php");
}
?>