<?php 
include "../Php/DB_Config.php";
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hotel Management System Portal</title>

    <style>
        .main-body{
            margin: auto;
        }
        table{
            margin: auto;
        }
        input{
            padding: 5px 10px;
            margin-bottom: 10px ;
        }
        fieldset{
            width: fit-content;
            margin: auto;
        }
    </style>
</head>
<body>
    <section class="main-body">
        <?php
            if(isset($_COOKIE['id']) && isset($_COOKIE['password'])){
                $id = $_COOKIE['id'] ;
                $pass = $_COOKIE['password'] ;
            }
            else{
                $id = '' ;
                $pass = '';
            }
        ?>
        <fieldset>
            <legend>Login</legend>
            <form action="../Php/Login_validation.php" method="POST">
                <table>
                    <tr>
                        <td><label for="">ID </label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="user_id" class="" id="email" aria-describedby="emailHelp" placeholder="User ID" value="<?php echo $id?>"></td>
                        <?php
                            if(isset($_SESSION['invalidUser'])){
                        ?>
                                <p><?php echo $_SESSION['invalidUser'];?></p>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td><label for="">Password </label></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password" class="" id="exampleInputPassword1" placeholder="Password" value="<?php echo $pass?>"></td>
                        <?php
                            if(isset($_SESSION['invalidPass'])){
                        ?>
                                <p><?php echo $_SESSION['invalidPass'];?></p>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>
                            <div class="error-message">
                                <?php
                                    if(isset($_SESSION['invalidPass'])){
                                ?>
                                        <p><?php echo $_SESSION['invalidPass'];?></p>
                                <?php
                                    }
                                    else if(isset($_SESSION['errorMessage'])){
                                        unset($_SESSION['register']);
                                        unset($_SESSION['invalidPass']);
                                ?>
                                    <p><?php echo $_SESSION['errorMessage'];?></p>
                                <?php
                                    }
                                    else if(isset($_SESSION['register'])){
                                        unset($_SESSION['errorMessage']);
                                ?>
                                        <p><?php echo $_SESSION['register'];?></p>
                                <?php
                                    }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="remember_me" id=""> Remember Me
                        </td>
                    </tr>
                    <tr>
                        <td><hr></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" class="btn-custom" value="Login">
                            <a href="../layouts/registration.php">Register</a>
                        </td>
                    </tr>
                </table>
            </form> 
        </fieldset>
        
    </section>
</body>
</html>
