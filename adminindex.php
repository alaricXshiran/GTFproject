<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN LOGIN PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:cornflowerblue">
<body>
    <div class="container">

        <form action="adminlog.php" method="post">
        <a href="index.php">Back to Login</a><br>
            <h1>ADMIN ONLY</h1><br>
            
            <?php
            if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p><?php
                                                                }
                                                                    ?>

            <label>Username</label>
            <input type="text" name="username" placeholder="UserName" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">LOGIN</button>
        </form>
    </div>

</body>

</html>