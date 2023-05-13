<?php 

if (isset($_POST['submit']) && isset($_FILES['file'])) {
	include "dbconn.php";

	echo "<pre>";
	print_r($_FILES['file']);
	echo "</pre>";

	$img_name = $_FILES['file']['name'];
	$img_size = $_FILES['file']['size'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$error = $_FILES['file']['error'];
    $name= $_POST['title'];


	if ($error === 0) {
		if ($img_size < 0) {
			$em = "Sorry, your file is too large.";
		    header("Location: adminhome.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png","pdf","docx","doc","docm"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO xfile(filex,namex) 
				VALUES('$new_img_name','$name')";
				mysqli_query($conn, $sql);
				header("Location: admindoc.php?");
                
				
			}else {
				$em = "You can't upload files of this type";
		        header("Location: adminhome.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: adminhome.php?error=$em");
	}

}else {
	header("Location: adminhome.php");
}