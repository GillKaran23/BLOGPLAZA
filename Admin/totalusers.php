<?Php
require_once('connect.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/app.js"></script>
    <link rel="stylesheet" href="../CSS/totaluser.css">
    <title>Total Users</title>
</head>

<body>


    <div>
        <?Php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM users WHERE id = '$id'";
            $r = mysqli_query($conn, $sql);
            if ($r) {
                header("Location: totalusers.php");
            }
        }
        ?>
    </div>
    <div class="back">

        <div class="nav">
            <img src="../IMG/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="../Admin/adminscreen.php"><b>Home</b></a></li>
                <li><a href="./index.php"><b>Log Out</b></a></li>
            </ul>
        </div>

        <div class="userslist">
            <h1>Users List</h1>
            <table class="userslists">
                <tr>
                    <th>S. No.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Operation</th>
                </tr>
                <?php
                $c = 1;
                $sq3 = "SELECT * from users";
                $res3 = mysqli_query($conn, $sq3);
                $num = mysqli_num_rows($res3);
                while ($row2 = mysqli_fetch_array($res3)) {
                ?>
                    <tr>
                        <td><?php echo $c++; ?></td>
                        <td><?php echo $row2['Name']; ?></td>
                        <td><?php echo $row2['Email']; ?></td>
                        <td><a href="totalusers.php?id=<?php echo $row2['id']; ?>" id="delbtn">Delete</a></td>
                    </tr>
                <?php } ?>

            </table>
        </div>
        <div>
            <?php
            if (isset($_POST['register'])) {
                $m = $_POST['email'];
                $m1 = $_POST['email1'];
                $n = $_POST['name'];
                $sql = "UPDATE users SET Name='$n',Email='$m1' WHERE Email='$m'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header ('Location: totalusers.php');
                } else {
                    echo "Error";
                }
            }
            ?>
        </div>
        <div class="updateuser">
            <form action="totalusers.php" method="POST">
                <h1>Update User</h1>
                <br><br><br>
                <label>Type Mail of User you want to Update:</label>
                <input type="email" name="email" id="email" placeholder="Type Mail Here:" required><br><br>
                <label>Type Name:</label>
                <input type="text" name="name" id="name" placeholder="Type Name Here:" required>
                <label>Type Mail:</label>
                <input type="email" name="email1" id="email1" placeholder="Type New Mail Here:" required>
                <input type="submit" value="UPDATE" name="register" class="button">

            </form>
        </div>

    </div>
</body>

</html>