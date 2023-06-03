<?php
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/adminscreen.css">
    <script src="../JS/app.js"></script>
    <title>Admin Screen</title>
</head>

<body>
    <div class="back">
        <div class="nav">
            <img src="../IMG/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="../index.php"><b>Log Out</b></a></li>
            </ul>
        </div>

        <div class="users_details">
            <h1>Total Users:</h1>
            <p><?php $sq = "SELECT * from users";
                $res = mysqli_query($conn, $sq);
                if ($c = mysqli_num_rows($res)) {
                    echo $c;
                } else {
                    echo "0";
                } ?></p>
            <a class="userdetails" href="../Admin/totalusers.php">view details</a>
        </div>

        <div class="totalblogs">
            <h1>Total Blogs:</h1>
            <p><?php $sq1 = "SELECT * from usersblog";
                $res1 = mysqli_query($conn, $sq1);
                if ($c = mysqli_num_rows($res1)) {
                    echo $c;
                } else {
                    echo "0";
                } ?></p>
            <a class="userdetails" href="../Admin/totalblogs.php">view details</a>
        </div>

        <div class="totaladmins">
            <h1>Total Admins:</h1>
            <p><?php $sq1 = "SELECT * from admins";
                $res1 = mysqli_query($conn, $sq1);
                if ($c = mysqli_num_rows($res1)) {
                    echo $c;
                } else {
                    echo "0";
                } ?></p>
            <a class="userdetails" href="admins.php">view details</a>
        </div>

        <div class="blogscount">
            <h1>Users</h1><br>
            <h1>With</h1><br>
            <h1>Blogs Count</h1><br>
            <a class="userdetails" href="../Admin/blogscount.php">view details</a>
        </div>


    </div>
</body>

</html>