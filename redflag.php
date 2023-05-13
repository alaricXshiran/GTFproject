
<?php   
include 'dbconn.php';  
if (isset($_POST['submit'])) {  

     $mark1 = $_POST['mark1'];  
     $flag = $_POST['rate'];
     $query = "UPDATE images SET redflag=('$flag')WHERE id=('$mark1'); ";  

     $query_run = mysqli_query($conn,$query);  
     if ($query_run) {
        echo'<script> alert("Delete Sucessfull"); </script>';  
        header("location:staffhome.php");
     }else{  
        echo'<script> alert("Delete Unsucessfull"); </script>';  
     }  
}  
else{
    echo'<script> alert("Something went wrong"); </script>';
    header("location:home.php");
}
?>