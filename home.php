<?php
session_start();

include "dbconn.php";
if (isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['email']) && isset($_SESSION['phonenumber'])) {
    $email = $_SESSION['email'];
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Upload incident</title>
        <link rel="stylesheet" href="home.css">
    </head>
    <body style="background-color:lightgrey">
    <body onload="getLocation()">
        <?php if (isset($_GET['error'])) : ?>
            <p><?php echo $_GET['error']; ?></p>
        <?php endif ?>

        <a href="logout.php">LOGOUT</a>
        <h1> welcome! <?php echo $_SESSION['firstname'];
                        echo ' ';
                        echo $_SESSION['lastname']; ?></h1>
        Email :<?php echo $_SESSION['email']; ?><br>
        Phone Number:<?php echo $_SESSION['phonenumber']; ?><br><br><br>
        <button onclick="getLocation()">Click To Refresh Location</button><br><br><br><br>

        <div class="container">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label>Select Image</label>
                <input type="file" name="my_image" required><br><br>

                <label>Urgency Level</label>
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" required />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" required />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" required />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" required />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" required />
                    <label for="star1" title="text">1 star</label>
                </div><br><br><br><br>


                <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>"><br>

                <label>Phone Number</label>
                <input type="text" name="phonenumber" value="<?php echo $_SESSION['phonenumber']; ?>"><br>


                <label>latitude</label>
                <input type="text" name="latitude" id="a" placeholder="latitude" required><br>

                



                <label>longitude</label>
                <input type="text" id="aa" name="longitude" placeholder="longitude" required><br>

                <textarea id="dess" name="dess" rows="4" cols="20" required>
                   description
                </textarea><br>
                <input type="submit" name="submit" value="Upload">

            </form>
        </div>

        <div class="container">
            <h1>Your Uploaded Incidents</h1>

            <?php
            $sql = "SELECT * FROM images where email='$email' ORDER BY id Asc";
            $res = mysqli_query($conn,  $sql);



            if (mysqli_num_rows($res) > 0) {
                while ($images = mysqli_fetch_assoc($res)) {

            ?>
                    <div class="aaa">
                        
                        <img src="uploads/<?= $images['image_url'] ?>">

                        <form action="incidentdelete.php" method="post">
                            <input type="hidden" name="del" value="<?= $images['id'] ?>">
                            <input type="submit" name="submit" value="Delete">
                        </form>
                    </div>
            <?php }
            } ?>
        </div>
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
    header("Location:index.php");
    exit();
}
?>