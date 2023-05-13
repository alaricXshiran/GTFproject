<?php
require_once('dbconn.php');
?>
<?php

if (isset($_POST)) {

    $firstname         = $_POST['firstname'];
    $lastname         = $_POST['lastname'];
    $email             = $_POST['email'];
    $phonenumber    = $_POST['phonenumber'];
    $password         = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO staff (firstname, lastname, email, phonenumber, password,role ) VALUES(?,?,?,?,?,?)";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password,$role]);
    if ($result) {
        echo "<script type='text/javascript'>alert('Registration Sucessfull')</script>";
        header("location:adminhome.php");
    } else {
        echo "<script type='text/javascript'>alert('There were erros while saving the data')</script>";
    }
} else {
    echo 'No data';
}
