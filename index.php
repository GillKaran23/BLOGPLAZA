<?php 
require_once('connection.php');
$sql = "SELECT *  FROM systemdetails";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    $fetch = mysqli_fetch_assoc($query);
}
$addr = $fetch['address'];
$call = $fetch['phone'];
$em = $fetch['email'];
$desc = $fetch['description'];
$yr = $fetch['year'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG PLAZA</title>
    <script src="JS/app.js"></script>
    <link rel="stylesheet" href="CSS/welcomescreen.css">
</head>

<body>
    <div class="back">
        <div class="nav">
            <img src="IMG/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="signup.php">Sign Up</a></li>
                <li class="break">|</li>
                <li><a href="login.php">Sign In</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>CREATE YOUR BLOGS</h1>
            <p>Share Your Thoughts With Us</p>

            <div>
                <button type="button" onclick="window.location.href='login.php'"><span></span>WRITE BLOGS</button>
            </div>
        </div>
    </div>

    <div class="footer2">
        <h1 class="head">ABOUT US</h1>
        <div class="txt">
        <label><?php echo $desc ?></label>
        </div>
    </div>

    <div class="footer">
        <h1 class="head">CONTACT US</h1>
        <center>
            <table>
                <tr>
                    <td rowspan="2"><img src="IMG/pin.png" alt="pin" class="pin"></td>
                    <td>
                        <h2 class="sub">Address</h2>
                    </td>
                    <td rowspan="2"><img src="IMG/call.png" alt="call" class="pin"></td>
                    <td>
                        <h2 class="sub">Call</h2>
                    </td>
                    <td rowspan="2"><img src="IMG/email.png" alt="email" class="email"></td>
                    <td>
                        <h2 class="sub">Email</h2>
                    </td>
                </tr>
                <tr>
                    <td><b class="sub"><?php echo $addr ?></b></td>
                    <td><b class="sub"><?php echo $call ?></b></td>
                    <td><b class="sub"><?php echo $em ?></b></td>
                </tr>
            </table>
        </center>
    </div>
    <div class="footer3">
        <center>
            <h4>&copy; <?php echo $yr ?> Copyright Blog Plaza</h4>
        </center>
    </div>
</body>
</html>