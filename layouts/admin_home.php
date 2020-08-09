<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <style>
        .box{
            margin: auto;
            text-align: center;
        }
        a{
            display: block;
        }
    </style>
</head>
<body>
    <?php
        session_start();
    ?>
        <div class="box">
            <h1>Welcome <?php echo $_SESSION['name']?></h1>
            <a href="../layouts/profile.php">Profile</a>
            <a href="../layouts/change_password.php">Change Password</a>
            <a href="../layouts/user_list.php">View Users</a>
            <a href="../php/logout.php">Logout</a>
        </div>
        
    <?php

    ?>
</body>
</html>