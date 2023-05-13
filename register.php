<?php
require_once('dbconn.php');
?>
<?php

if(isset($_POST)){

	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	$phonenumber	= $_POST['phonenumber'];
	$password 		= $_POST['password'];
    $cpassword 		= $_POST['cpassword'];
    if($password==$cpassword){
        $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password ) VALUES(?,?,?,?,?)";
		$stmtinsert = $conn->prepare($sql);
		$result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
		if($result){
            echo "<script type='text/javascript'>alert('Registration Sucessfull')</script>";
            
		}else{
            echo "<script type='text/javascript'>alert('There were erros while saving the data')</script>";
		}	
    }
    else{
        echo "<script type='text/javascript'>alert('Passwords Dont Match')</script>";
    }
   
}else{
	echo 'No  data';
}