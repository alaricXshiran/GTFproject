<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "dbconn.php";

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	$email= $_POST['username'];
    $latitude= $_POST['latitude'];
    $longitude= $_POST['longitude'];
	$dess= $_POST['dess'];
    $spot=1;

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: home.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO images(image_url,email,latitude,longitude,dess,spot) 
				VALUES('$new_img_name','$email','$latitude','$longitude','$dess','$spot')";
				mysqli_query($conn, $sql);
				header("Location: adminhome.php?");
                
				
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