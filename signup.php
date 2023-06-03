<?php
require_once('connection.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/signup.css">
    <script src="JS/app.js"></script>
    <title>SignUp</title>
</head>

<body>
    <div>
    <?php
        if(isset($_POST['register'])){
            $name       = $_POST['name'];
            $email      = $_POST['email'];
            $password   = $_POST['password'];
            $cpass      = $_POST['con_password'];
            
            $sql = "INSERT INTO users (Name,Email,Password) VALUES('$name','$email','$password')";
            $result = mysqli_query($conn,$sql);
            if($result && strcmp($password,$cpass)==0){
                echo "Registered";
                
                header("Location: login.php");
            }else{
                echo '<script> alert("SignUp Failed"); </script>';
            }
            }
        ?>
    </div>
    <br><br><br><br><br>
    <div class="center">
        <form class="container" action="signup.php" method="POST" autocomplete="off">
                <h1>SignUp</h1>
                <label>Username</label>
                <input type="text" name="name" id="name"  placeholder="Type Your Username here" required>
                <label>Email Id</label>
                <input type="email" name="email" id="email" placeholder="Type Your Email here" required>
                <label>Password</label>
                <input type="password" name="password" id="password" placeholder="Type Your Password here" required>
                <label> Confirm Password</label>
                <input type="password" name="con_password" id="con_password" placeholder="Re-Enter Your Password here" required>
                <input name="register" type="submit" value="Register" class="button">
                <div class="login-link">
                <label>have an account? <a href="login.php">LogIn</a></label>
                </div>
        </form>
    </div>
</body>

</html>