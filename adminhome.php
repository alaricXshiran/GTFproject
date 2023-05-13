<?php
session_start();
include "dbconn.php";
if (isset($_SESSION['name']) && isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>HOME PAGE</title>
    </head>
    <body style="background-color:cornflowerblue">
    <body>
        <a href="logout.php">LOGOUT</a><br>

        <a href="admindoc.php">Add Articales</a>
        <h1> welcome,<?php echo $_SESSION['name']; ?></h1>
        <B>Position :<?php echo $_SESSION['username']; ?></B><br>

        <div class="container">
            <form action="staffregister.php" method="post">
                <h1>Register Staff</h1><br>
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
                <input type="number" name="phonenumber" placeholder="Phone Number" required><br>

                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required><br>

                <label>Title</label>
                <select name="role" required>
                    <option value="captains">Captain</option>
                    <option value="staff">Collecting Staff</option>
                </select>
                <button type="submit">Register Staff Member</button><br>
            </form>
        </div><br><br><br><br>

        <button onclick="getLocation()">Click To Get Current Location</button><br>

        <div class="container">

            <form action="adminupload.php" method="post" enctype="multipart/form-data">

                <label>Select Image</label>
                <input type="file" name="my_image" required><br>

                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>"><br>

                <label>latitude</label>
                <input type="text" name="latitude" id="a" placeholder="latitude" required><br>

                <label>longitude</label>
                <input type="text" id="aa" name="longitude" placeholder="longitude" required><br>

                <textarea id="dess" name="dess" rows="4" cols="20" required>
                </textarea><br>
                <input type="submit" name="submit" value="Upload">

            </form>
        </div>
        <br>

        <?php
        $sql = "SELECT * FROM images ORDER BY id Asc";
        $res = mysqli_query($conn,  $sql);


        $cur = 0;
        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {

        ?>
                    <div class="aaa">
                        <label>Incident ID :<?= $images['id'] ?></label><br>
                        <label>Uploaded User :<?= $images['email'] ?></label>
                        <form action="deletebyadmin.php" method="post">
                            <input type="text" name="del" value="<?= $images['id'] ?>">
                            <input type="submit" name="submit" value="Delete Incident">
                        </form>

                        <img src="uploads/<?= $images['image_url'] ?>"><br><br><br><br>
                    </div>

        <?php  $cur = $cur + 1; }
           
        } ?>


    </body>

    <script>
        var x = document.getElementById("a");
        var xx = document.getElementById("aa");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            x.value = position.coords.latitude;
            xx.value = position.coords.longitude;
        }
    </script>

    </html>
<?php
} else {
    header("Location: adminindex.php");
    exit();
}
?>