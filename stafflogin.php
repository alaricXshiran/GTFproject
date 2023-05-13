<?php

session_start();
include "dbconn.php";


if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: index.php?error=email email is required");
        exit();
    } elseif (empty($password)) {
        header("Location: index.php?error=password Password is required");
        exit();
    }

    $sqlx = "SELECT * FROM staff WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sqlx);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $password) {
            echo "LogIn Sucessfull";
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['role'] = $row['role'];
            header("Location: staffhome.php");
        } else {
            echo'<script> alert("Unsucessfull"); </script>';
            exit();
        }
    } else {
        echo'<script> alert("Unsucessfull"); </script>';
        exit();
    }
}
