<!DOCTYPE html>
<html lang="en">

<head>
    <title>STAFF LOGIN PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:aqua">

<body>
    <div class="container">

        <form action="stafflogin.php" method="post">
            <h1>STAFF LOGIN</h1><br>

            <?php
            if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p><?php
                                                                }
                                                                    ?>

            <label>Email</label>
            <input type="text" name="email" placeholder="Email" required><br>

            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required><br>

            <input type="submit" value="Login" >
        </form>
    </div>
    <a href="adminindex.php">Admin Only</a>
</body>

</html>