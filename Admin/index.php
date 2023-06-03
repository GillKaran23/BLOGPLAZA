<?php
require_once('connect.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <script src="../JS/app.js"></script>
    <title>Admin Login</title>
</head>

<body>
    <div>
        <?php
        session_start();
        include('connect.php');
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $_SESSION["email"]=$email;

            $sql = "SELECT *  FROM admins WHERE Email='$email' AND Password='$password'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $count = mysqli_num_rows($query);

            if ($count == 1) {

                header("Location: adminscreen.php");
            } else {
                echo '<script> window.alert("LogIn Failed"); </script>';
            }
        }
        ?>
    </div>
    <br><br><br><br><br>
    <div class="center">
        <form action="index.php" method="POST" autocomplete="off">
            <h1>Admin Login</h1>
            <label>Email Id</label>
            <input type="email" name="email" id="email" placeholder="Type Your Email here" required>
            <label>Password</label>
            <input type="password" name="password" id="password" placeholder="Type Your Password" required>
            <input name="submit" type="submit" value="LOGIN" class="loginbtn">
        </form>
    </div>
</body>

</html>