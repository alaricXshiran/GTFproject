<?php
session_start();
include "dbconn.php";
if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>HOME PAGE</title>
    </head>
    <style>
        #map {
            height: 50%;
            width: 50%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1Gcx9zKJ7DPrM6W2BQNViWwVclu92EUs&callback=initMap&v=weekly" defer></script>
    <?php

    $alpha = "captains";
    if ($_SESSION['role'] == $alpha) {
    ?>
        <!-- Captains Body -->
        <body style="background-color:cadetblue">
        <body>
            <a href="logout.php">LOGOUT</a>
            <h1> welcome,<?php echo $_SESSION['email']; ?></h1>
            <B>Position :<?php echo $_SESSION['role']; ?></B><br>
            <?php
            $sql = "SELECT * FROM images ORDER BY id Asc";
            $res = mysqli_query($conn,  $sql);


            $cur = 0;
            if (mysqli_num_rows($res) > 0) {
                while ($images = mysqli_fetch_assoc($res)) {

            ?>
                    <button onclick="infoOpen(<?php echo $cur; ?>)">
                        <div class="aaa">
                            <label>Incident ID :<?= $images['id'] ?></label><br>
                            <label>Uploaded User :<?= $images['email'] ?></label>

                            <form action="deletebystaff.php" method="post">
                                <input type="hidden" name="del" value="<?= $images['id'] ?>">
                                <input type="submit" name="submit" value="Reject">
                            </form><br>

                            <img src="uploads/<?= $images['image_url'] ?>"><br>




                            <form action="redflag.php" method="post">
                                <label>Urgency Level :<?= $images['rating'] ?></label><br>
                                <div class="rate">
                                    <input type="radio" id="star2" name="rate" value="0" required <?php if ($images['redflag'] == 0) {
                                                                                                        echo "checked";
                                                                                                    } ?> />
                                    <label for="star2" title="text">Green</label><br>
                                    <input type="radio" id="star1" name="rate" value="1" required <?php if ($images['redflag'] == 1) {
                                                                                                        echo "checked";
                                                                                                    } ?> />
                                    <label for="star1" title="text">Red</label>
                                </div>
                                <input type="hidden" name="mark1" value="<?= $images['id'] ?>">
                                <input type="submit" name="submit" value="Change Mark"><br>



                                <div class="locationx">
                                    <input type="hidden" id="lat" value="<?= $images['latitude'] ?>">
                                    <input type="hidden" id="lon" value="<?= $images['longitude'] ?>">
                                    <input type="hidden" id="xdess" value="<?= $images['dess'] ?>">
                                    <input type="hidden" id="xid" value="<?= $images['id'] ?>">
                                    <input type="hidden" id="ximage_url" value="uploads/<?= $images['image_url'] ?>">
                                    <input type="hidden" id="rf" value="<?= $images['redflag'] ?>">
                                    <input type="hidden" id="spot" value="<?= $images['spot'] ?>">
                                </div>



                                <br><br>
                            </form>

                        </div>
                    </button>
            <?php $cur = $cur + 1;
                }
            } ?>
            <div id="map"></div>



        </body>

    <?php
    } else {
    ?>
        <!-- Staff Body -->
        <body style="background-color:aquamarine">
        <body>
            <a href="logout.php">LOGOUT</a>
            <h1> welcome,<?php echo $_SESSION['email']; ?></h1>
            <B>Position :<?php echo $_SESSION['role']; ?></B><br>
            <?php
            $sql = "SELECT * FROM images ORDER BY id Asc";
            $res = mysqli_query($conn,  $sql);


            $cur = 0;
            if (mysqli_num_rows($res) > 0) {
                while ($images = mysqli_fetch_assoc($res)) {

            ?>
                    <button onclick="infoOpen(<?php echo $cur; ?>)">
                        <div class="aaa">
                            <label>Incident ID :<?= $images['id'] ?></label><br>
                            <label>Uploaded User :<?= $images['email'] ?></label><br><br>

                            <img src="uploads/<?= $images['image_url'] ?>"><br>

                            <form>
                                <label>Urgency Level :<?= $images['rating'] ?></label><br>
                                <input type="hidden" name="mark1" value="<?= $images['id'] ?>">


                                <div class="locationx">
                                    <input type="hidden" id="lat" value="<?= $images['latitude'] ?>">
                                    <input type="hidden" id="lon" value="<?= $images['longitude'] ?>">
                                    <input type="hidden" id="xdess" value="<?= $images['dess'] ?>">
                                    <input type="hidden" id="xid" value="<?= $images['id'] ?>">
                                    <input type="hidden" id="ximage_url" value="uploads/<?= $images['image_url'] ?>">
                                    <input type="hidden" id="rf" value="<?= $images['redflag'] ?>">
                                    <input type="hidden" id="spot" value="<?= $images['spot'] ?>">
                                </div>

                                <br><br>
                            </form>

                        </div>
                    </button>
            <?php $cur = $cur + 1;
                }
            } ?>
            <div id="map"></div>



        </body>


    <?php } ?>

    </html>
<?php
} else {
    header("Location: staffindex.php");
    exit();
}
?>

<script>
    let map;
    var gmarkers = [];

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(7.2220672, 79.8916608),
            zoom: 11,
        });
        const iconBase =
            "http://localhost/GTFproject/icons/";
        const icons = {
            if () {

            },
            redflags: {
                icon: iconBase + "redflags.png",
            },
            library: {
                icon: iconBase + "library_maps.png",
            },
        };





        var xloc = document.getElementsByClassName("locationx");

        var infowindow = new google.maps.InfoWindow();

        var marker, i;
        for (i = 0; i < xloc.length; i++) {
            if (xloc[i].querySelector("#spot").value == 1){
                marker = new google.maps.Marker({
                        position: new google.maps.LatLng(xloc[i].querySelector("#lat").value, xloc[i].querySelector("#lon").value),
                        icon: iconBase + 'spotss.png',
                        map: map
                    });
            }

                else if (xloc[i].querySelector("#rf").value == 1) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(xloc[i].querySelector("#lat").value, xloc[i].querySelector("#lon").value),
                        icon: iconBase + 'redflags.png',
                        map: map
                    });
                }
            else {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(xloc[i].querySelector("#lat").value, xloc[i].querySelector("#lon").value),
                    icon: iconBase + 'greenflags.png',
                    map: map
                });
            }
            gmarkers.push(marker);
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent("<div><h3>Incident ID : " + xloc[i].querySelector("#xid").value + "</h3><p>" + xloc[i].querySelector("#xdess").value + "</p><img width=60 height=60 src='" + xloc[i].querySelector("#ximage_url").value + "'></div>");
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

    }

    function infoOpen(i) {
        google.maps.event.trigger(gmarkers[i], 'click');
    }
</script>