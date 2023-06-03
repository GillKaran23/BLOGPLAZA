<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/app.js"></script>
    <link rel="stylesheet" href="../CSS/blogcount.css">
    <title>Blogs Count</title>
</head>

<body>
    <div class="back">
        <div class="nav">
            <img src="../IMG/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="../Admin/adminscreen.php"><b>Home</b></a></li>
                <li><a href="../index.php"><b>Log Out</b></a></li>
            </ul>
        </div>
        <div class="userslist">
            <h1>Users Blog Counts</h1>
            <table class="userslists">
                <tr>
                    <th>S. No.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Total Blogs</th>
                    <th>Operation</th>
                </tr>
                <?php
                $cd = 1;
                $sq3 = "SELECT * from users";
                $res3 = mysqli_query($conn, $sq3);
                $num = mysqli_num_rows($res3);
                while ($row2 = mysqli_fetch_array($res3)) {
                ?>
                    <tr>
                        <td><?php echo $cd++; ?></td>
                        <td><?php echo $row2['Name']; ?></td>
                        <td><?php echo $row2['Email']; ?></td>
                        <td><?php $count = $row2['Email'];
                        $sq = "SELECT * from usersblog WHERE Email='$count'";
                            $res = mysqli_query($conn, $sq);
                            if ($c = mysqli_num_rows($res)) {
                                echo $c;
                            } else {
                                echo "0";
                            } ?></td>
                        <td><a href="personalblogs.php?Email=<?php echo $row2['Email']; ?>" id="viewblog">View Blogs</a></td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>
</body>

</html>