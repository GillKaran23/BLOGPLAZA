<?php
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins</title>
    <script src="../JS/app.js"></script>
    <link rel="stylesheet" href="../CSS/totaladmin.css">
</head>

<body>
    <div>
        <?php
        if (isset($_POST['register'])) {
            $name       = $_POST['name'];
            $email      = $_POST['email'];
            $password   = $_POST['password'];
            $cpass      = $_POST['con_password'];

            $sql = "INSERT INTO admins (Name,Email,Password) VALUES('$name','$email','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result && strcmp($password, $cpass) == 0) {
                echo '<script> alert("Adding Successful"); </script>';

                header("Location: admins.php");
            } else {
                echo '<script> alert("Adding Failed"); </script>';
            }
        }
        ?>
    </div>

    <div>
        <?php 
        if(isset($_POST['del'])){
            $e = $_POST['emailid'];
            $sql2 = "DELETE FROM admins WHERE Email = '$e'";
            $r = mysqli_query($conn,$sql2);
            if($r){
                header("Location: admins.php");
            }
        }
        ?>
    </div>
    <div class="back">

        <div class="listsadmin">
            <h1>Admins</h1>
            <form action="admins.php" method="POST" autocomplete="off">
                <input type="email" name="emailid" id="emailid" placeholder="Type Email here">
                <input type="submit" name="del" value="Delete Admin" class="delbtn">
            </form>
            <table class="adminslist">
                <tr>
                    <th>S. No.</th>
                    <th>Admin Names</th>
                    <th>Email Id</th>
                </tr>
                <?php
                $c = 1;
                $sq3 = "SELECT * from admins";
                $res3 = mysqli_query($conn, $sq3);
                $num = mysqli_num_rows($res3);
                while ($row2 = mysqli_fetch_array($res3)) {
                ?>
                    <tr>
                        <td><?php echo $c++; ?></td>
                        <td><?php echo $row2['Name']; ?></td>
                        <td><?php echo $row2['Email']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="addadmin">
            <form action="admins.php" method="POST" autocomplete="off">
                <br><br><br><br><br>
                <h1>Add Admin</h1>
                <label>Admin name</label>
                <input type="text" name="name" id="name" placeholder="Type Admin Name here" required>
                <label>Email Id</label>
                <input type="email" name="email" id="email" placeholder="Type Email here" required>
                <label>Password</label>
                <input type="password" name="password" id="password" placeholder="Type Password here" required>
                <label> Confirm Password</label>
                <input type="password" name="con_password" id="con_password" placeholder="Re-Enter Password here" required>
                <input name="register" type="submit" value="Add Admin" class="button">
            </form>
        </div>

        <div class="nav">
            <img src="../IMG/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="../Admin/adminscreen.php"><b>Home</b></a></li>
                <li><a href="../index.php"><b>Log Out</b></a></li>
            </ul>
        </div>

    </div>
</body>

</html>