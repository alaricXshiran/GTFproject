<?php

session_start();
include "dbconn.php";


if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: adminindex.php?error=username Username is required");
        exit();
    } elseif (empty($password)) {
        header("Location: adminindex.php?error=password Password is required");
        exit();
    }

    $sqlx = "SELECT * FROM adminx WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sqlx);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] === $username && $row['password'] === $password) {
            echo "LogIn Sucessfull";
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            header("Location: adminhome.php");
            exit();
        } else {
            header("Location: adminindex.php?error=Wrong username or Password");
            exit();
        }
    } else {
        header("Location: adminindex.php");
        exit();
    }
}