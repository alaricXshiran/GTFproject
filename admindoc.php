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
    <body style="background-color:dimgray">
    <body>
        <a href="logout.php">LOGOUT</a><br>
        <a href="adminhome.php">GoTo Admin Home</a>

       <h1>Add Article</h1>
        <B>Position :<?php echo $_SESSION['username']; ?></B><br>


        

        <div class="container">

            <form action="docupload.php" method="post" enctype="multipart/form-data">

                <label>Name the artical</label>
                <input type="text" name="title" id="aa" placeholder="Title" required><br>
                <label>Select Image</label>
                <input type="file" name="file" required><br>
                <input type="submit" name="submit" value="Upload">

            </form>
        </div>
        <br>

        <?php
        $sql = "SELECT * FROM xfile ORDER BY id Asc";
        $res = mysqli_query($conn,  $sql);


        $cur = 0;
        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {

        ?>
                    <div class="aaa">
                        <label>File ID :<?= $images['id'] ?></label><br>
                        <label>File Name :<?= $images['namex'] ?></label><br>

                        <form action="deletedoc.php" method="post">
                            <input type="text" name="del" value="<?= $images['id'] ?>">
                            <input type="submit" name="submit" value="Delete Incident">
                        </form>

                    </div>

        <?php  $cur = $cur + 1; }
           
        } ?>


    </body>
    </html>
<?php
} else {
    header("Location: adminindex.php");
    exit();
}
?>