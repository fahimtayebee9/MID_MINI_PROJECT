<?php
    include "DB_Config.php";
    session_start();
    if(isset($_POST['submit'])){
        if(empty($_POST['email']) || empty($_POST['password'])){
            echo "<h4>Invalid Input</h4>";
        }
        else{
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM users where email='$email' and password = '$password'";
            $alluser = mysqli_query($db, $sql);
            $i = mysqli_num_rows($alluser);
            if($i > 0){
                while( $row = mysqli_fetch_assoc($alluser) ){
                    $id       = $row['id'];
                    $email_db    = $row['email'];
                    $username_db   = $row['username'];
                    $password_db  = $row['password'];
                    $role = $row['role'];
                    if(($email == $email_db) && ($password == $password_db)){
                        if($role == 'Admin'){
                            $_SESSION['username'] = $username_db;
                            setcookie('email', $email, time() + (86400 * 30), "/");
                            setcookie('password', $password, time() + (86400 * 30), "/");
                            header('location: ../layouts/admin_home.php');
                            break;
                        }
                        else if($role == 'User'){
                            $_SESSION['username'] = $username_db;
                            header('location: ../layouts/user_home.php');
                            break;
                        }
                        else{
                            $_SESSION['invalidUser'] = "Inavlid Username..";
                            $_SESSION['invalidpass'] = "Invalid Password..";
                            header('location: ../layouts/login.php');
                        }
                    }
                    else{
                        if($password != $password_db){
                            $code=0;
                            $_SESSION['invalidpass'] = "Invalid Password..";
                            header('location: ../layouts/login.php');
                            echo returnVal($code);
                            exit;
                        }
                        else if($email != $email_db){
                            $code=1;
                            $_SESSION['invalidUser'] = "Inavlid Username..";
                            header('location: ../layouts/login.php');
                            echo returnVal($code);
                            exit;
                        }
                    }
                } 
            }
            else{
                if($password != $password_db){
                    $code=0;
                    $_SESSION['invalidpass'] = "Invalid Password..";
                    header('location: ../layouts/login.php');
                    exit;
                }
                else if($email != $email_db){
                    $code=1;
                    $_SESSION['invalidUser'] = "Inavlid Username..";
                    header('location: ../layouts/login.php');
                    exit;
                }
            }
        }
    }
    else if(isset($_POST['register'])){
        header('location: ../layouts/registration.php');
    }
    else{

    }
    function returnVal($code){
        if($code!=1){
            $passErr = 'Invalid Password..';
            return $passErr;
        }
        else{
            $value = 'Invalid Email/username...';
            return $value;
        }
    }
?>
