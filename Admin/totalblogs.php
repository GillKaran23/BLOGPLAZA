<?php
require_once('connect.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/app.js"></script>
    <link rel="stylesheet" href="../CSS/totalblog.css">
    <title>Users Blogs</title>
</head>

<body>
    <div>
        <?Php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "DELETE FROM usersblog WHERE id = '$id'";
                $r = mysqli_query($conn, $sql);
                if ($r) {
                    header("Location: totalblogs.php");
                }
            }
            ?>
    </div>
    <div class="back">
        <div class="nav">
            <img src="../IMG/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="../Admin/adminscreen.php"><b>Home</b></a></li>
                <li><a href="../index.php"><b>Log Out</b></a></li>
            </ul>
        </div>
        <div class="blogs">
            <h1>Users Blogs</h1>
            <table class="bloglist">
                <tr>
                    <th>S. No.</th>
                    <th>Users</th>
                    <th>Email Id</th>
                    <th>Topic</th>
                    <th>Blog</th>
                    <th>Operation</th>
                </tr>
                <?php
                $c = 1;
                $sq3 = "SELECT * from usersblog";
                $res3 = mysqli_query($conn, $sq3);
                $num = mysqli_num_rows($res3);
                while ($row2 = mysqli_fetch_array($res3)) {
                ?>
                    <tr>
                        <td><?php echo $c++; ?></td>
                        <td><?php echo $row2['User']; ?></td>
                        <td><?php echo $row2['Email']; ?></td>
                        <td><?php echo $row2['Topic']; ?></td>
                        <td><?php echo $row2['Blog']; ?></td>
                        <td><a href="totalblogs.php?id=<?php echo $row2['id']; ?>" id="delbtn">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>