<?php
require_once('connection.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Screen</title>
    <link rel="stylesheet" href="CSS/userscreen.css">
    <script src="JS/app.js"></script>
</head>

<body>
    <div>
        <?php
        session_start();
        $e = $_SESSION["email"];

        $sql = "SELECT *  FROM users WHERE Email='$e'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            $fetch = mysqli_fetch_assoc($query);
        }
        $email = $fetch['Email'];
        $name =   $fetch['Name'];
        ?>
    </div>

    <div>
        <?php
        if (isset($_POST['chgpass'])) {
            $email;
            $cp   =  $_POST['ppass'];
            $np   =  $_POST['npass'];

            $sql = "UPDATE users SET Password='$np' WHERE Password='$cp' AND Email='$email'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script> alert("Updated"); </script>';
            } else {
                echo "Error";
            }
        }
        ?>
    </div>

    <div>
        <?php
        if (isset($_POST['register'])) {
            $name;
            $email;
            $blog  = $_POST['blog'];
            $topic = $_POST['topic'];

            $sql = "INSERT INTO usersblog (User,Email,Topic,Blog) VALUES('$name','$email','$topic','$blog')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('Location: userscreen.php');
            } else {
                echo "Error";
            }
        }
        ?>
    </div>
    <div class="back">

        <div class="userprofile">
            <br><br><br><br><br>
            <h1 style="text-align: center;">Your Profile</h1>
            <br><br>
            <h3 class="det">Username:</h3>
            <p><?php echo $name; ?></p>
            <br>
            <h3 class="det">Email:</h3>
            <p><?php echo $email; ?></p>
            <br>
            <h3 class="det">Total Blogs:</h3>
            <p><?php $sq = "SELECT * from usersblog WHERE Email='$email'";
                $res = mysqli_query($conn, $sq);
                if ($c = mysqli_num_rows($res)) {
                    echo $c;
                } else {
                    echo "Not Write Any Blog";
                } ?></p>
            <br>
            <h4>SHARE YOUR THOUGHTS WITH US</h4><br>
            <a href="#divOne"><button class="writeblog">Write Blog</button></a>
            <br><br>
            <a href="yourblogs.php?Email=<?php echo $e ?>"><button class="writeblog">Read Your Blogs</button></a>
            <br><br>
            <a class="chg-link" href="#divTwo">Change your password</a>
        </div>

        <div class="nav">
            <img src="IMG/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="index.php"><b>Log Out</b></a></li>
            </ul>
        </div>



        <div class="readblog">
            <?php $sq3 = "SELECT * from usersblog";
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
                </div>
            <?php
            }
            ?>
        </div>




        <div class="overlay" id="divOne">
            <div class="wrapper">
                <h2>Write Blog</h2>
                <a href="userscreen.php" class="close">&times;</a>
                <div class="content">
                    <div class="container">
                        <form action="userscreen.php" method="POST" autocomplete="off">
                            <label class="lbl">Topic</label>
                            <input class="txtar" name="topic" placeholder="Type the Topic" required></input>
                            <label class="lbl">Type the Blog</label>
                            <textarea name="blog" placeholder="Write Your Blog Here" required></textarea>
                            <input name="register" type="submit" value="Register" class="blogbtn">
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="overlay1" id="divTwo">
            <div class="wrapper1">
                <h2>Change Password</h2>
                <a href="userscreen.php" class="close1">&times;</a>
                <div class="content1">
                    <div class="container1">
                        <form action="userscreen.php" method="POST" autocomplete="off">
                            <label class="lbl1">Current Password:</label>
                            <input type="password" class="txtar" name="ppass" placeholder="Current" required></input>
                            <label class="lbl1">New Password:</label>
                            <input type="password" class="txtar" name="npass" placeholder="New" required></input>
                            <input href="userscreen.php" name="chgpass" type="submit" value="Register" class="passbtn">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>