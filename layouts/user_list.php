<?php
    include "../php/DB_Config.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table,tr,td,th{
        border: none;
        border-collapse: collapse;
        border: 2px solid black;
    }
    h3{
        text-align: center;
    }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan=4><h3>USERS</h3></td>
        </tr>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>User Type</th>
        </tr>
        
        <?php
            $query = "SELECT * FROM user_test";
            $users = mysqli_query($db,$query);
            while( $row = mysqli_fetch_assoc($users) ){
                $id       = $row['id'];
                $name     = $row['name'];
                $email    = $row['email'];
                $userType    = $row['userType'];
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $userType; ?></td>
                </tr>

        <?php  
            } 
        ?>
        <tr>
            <td colspan=4><a href="admin_home.php">Go Home</a></td>
        </tr>
    </table>
</body>
</html>
