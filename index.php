<?php
include "dbconn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>

<body style="background-color:aqua">
<body>
    
    <div class="row">

        <div class="panel-headding">

            <form action="log.php" method="post">
                <h1>LOGIN</h1><br>

                <?php
                if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p><?php
                                                                    }
                                                                        ?>
                <label>Email</label>
                <input type="text" name="email" placeholder="Email">

                <label>Password</label>
                <input type="password" name="password" placeholder="Password">

                <button type="submit">LOGIN</button><br><br><br>
            </form>
        </div>
        <div class="container">

            <form action="register.php" method="post">
                <h1>Register</h1><br>
                <?php
                if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p><?php
                                                                    }
                                                                        ?>

                <label>First Name</label>
                <input type="text" name="firstname" placeholder="First Name" required><br>

                <label>Last Name</label>
                <input type="text" name="lastname" placeholder="Last Name" required><br>
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" required><br>

                <label>Phone Number</label>
                <input type="text" name="phonenumber" placeholder="Phone Number" required><br>

                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required><br>

                <label>Confirm Password</label>
                <input type="text" name="cpassword" placeholder="Confirm Password" required><br>

                <button type="submit">Register</button><br>
            </form>
        </div>
    </div>


    <?php
    $sql = "SELECT * FROM xfile ORDER BY id Asc";
    $res = mysqli_query($conn,  $sql);


    $cur = 0;
    if (mysqli_num_rows($res) > 0) {
        while ($images = mysqli_fetch_assoc($res)) {

    ?>
            <div class="aaa">
                <H1><?= $images['namex'] ?></H1><br>

                <div class="container">
                    <article>
                        <iframe src="uploads/<?= $images['filex'] ?>#toolbar=0" type="application/pdf" width="100%" height="600px" ></iframe>
                    </article>

                </div>
            </div>

    <?php $cur = $cur + 1;
        }
    } ?>



    <a href="staffindex.php">Department Only</a>
</body>

</html>

