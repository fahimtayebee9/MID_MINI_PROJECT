<?php
    include "DB_Config.php";
    session_start();
    if(isset($_POST['submit'])){
        if(empty($_POST['user_id']) || empty($_POST['password'])){
            echo "<h4>Invalid Input</h4>";
        }
        else{
            $id = $_POST['user_id'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM user_test where id='$id' and password = '$password'";
            $alluser = mysqli_query($db, $sql);
            $i = mysqli_num_rows($alluser);
            if($i > 0){
                while( $row = mysqli_fetch_assoc($alluser) ){
                    $id_db       = $row['id'];
                    $email_db    = $row['email'];
                    $password_db  = $row['password'];
                    $role = $row['userType'];
                    $name = $row['name'];
                    if(($id == $id_db) && ($password == $password_db)){
                        if($role == 'Admin'){
                            $_SESSION['name'] = $name;
                            $_SESSION['email'] = $email_db;
                            $_SESSION['id'] = $id;
                            $_SESSION['role'] = $role;
                            if(isset($_POST['remember_me'])){
                                setcookie('id', $id, time() + (86400 * 30), "/");
                                setcookie('password', $password, time() + (86400 * 30), "/");
                            }
                            header('location: ../layouts/admin_home.php');
                            break;
                        }
                        else if($role == 'User'){
                            $_SESSION['name'] = $name;
                            $_SESSION['email'] = $email_db;
                            $_SESSION['id'] = $id;
                            $_SESSION['role'] = $role;
                            if(isset($_POST['remember_me'])){
                                setcookie('id', $id, time() + (86400 * 30), "/");
                                setcookie('password', $password, time() + (86400 * 30), "/");
                            }
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
