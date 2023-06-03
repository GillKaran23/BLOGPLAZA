<?php
require_once('connection.php');
session_start();
$e = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/app.js"></script>
    <link rel="stylesheet" href="CSS/yourblog.css">
    <title>Your Blogs</title>
</head>

<body>
    <div>
        <?Php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "DELETE FROM usersblog WHERE id = '$id'";
                $r = mysqli_query($conn, $sql);
                if ($r) {
                    header("Location: yourblogs.php");
                }
            }
            ?>
    </div>
    <div class="back">
        <div class="nav">
            <img src="IMG/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="userscreen.php"><b>Home</b></a></li>
                <li><a href="index.php"><b>Log Out</b></a></li>
            </ul>
        </div>
        <div class="blogs">
            <h1>Your Blogs</h1>
            <?php $sq3 = "SELECT * from usersblog WHERE EMAIL='$e'";
            $res3 = mysqli_query($conn, $sq3);
            $num = mysqli_num_rows($res3);
            while ($row1 = mysqli_fetch_array($res3)) {
            ?>
                <div class="bloge">
                    <h3><?php echo $row1['User']; ?></h3>
                    <label><?php echo $row1['Email']; ?></label><br>
                    <br>
                    <hr color="#000000">
                    <br>
                    <h2><?php echo $row1['Topic']; ?></h2><br>
                    <p><?php echo $row1['Blog']; ?></p>
                    <br>
                    <a href="yourblogs.php?id=<?php echo $row1['id']; ?>" id="delbtn">Delete this blog</a>
                </div>
            <?php
            }
            ?>
    </div>
</body>

</html>