<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        table,tr,td{
            border-collapse: collapse;
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        include "../php/DB_Config.php";
        $id=$_SESSION['id'];
        $sql = "SELECT * from user_test where id = '$id'";
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result) > 1){
            echo "ERROR 404";
        }
        else{
            $data=mysqli_fetch_assoc($result);
            $name = $data['name'];
            $email = $data['email'];
            $userType = $data['userType'];
        }
    ?>
    <table>
        <tr>
            <td colspan=2 style="text-align: center;">Profile</td>
        </tr>
        <tr>
            <td>Id </td>
            <td><?php echo $id;?></td>
        </tr>
        <tr>
            <td>Name </td>
            <td><?php echo $name;?></td>
        </tr>
        <tr>
            <td>Email </td>
            <td><?php echo $email?></td>
        </tr>
        <tr>
            <td>User Type </td>
            <td><?php echo $userType?></td>
        </tr>
        <tr>
            <td colspan=2>
                <?php

                    if($_SESSION['role'] == 'Admin'){
                ?>
                        <a href="admin_home.php">Go Home</a>
                <?php
                    }
                    else{
                ?>
                    <a href="user_home.php">Go Home</a>
                <?php
                    }
                ?>
            </td>
        </tr>
    </table>
</body>
</html>
