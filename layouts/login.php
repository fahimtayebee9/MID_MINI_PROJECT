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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/logRegStyle.css">
    <title>Hotel Management System Portal</title>
</head>
<body>
    <section class="main-body">
        <div class="container">
            <div class="row justify-content-center m-auto row-height align-items-center">
                <div class="col-6 form-background">
                    <div class="row text-center justify-content-center align-items-center">
                        <div class="col-12">
                            <h1>Login To Continue</h1>
                        </div>
                    </div>
                    <?php
                        if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
                            $email = $_COOKIE['email'] ;
                            $pass = $_COOKIE['password'] ;
                        }
                        else{
                            $email = '' ;
                            $pass = '';
                        }
                    ?>
                    <form action="../Php/Login_validation.php" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Email address" value="<?php echo $email?>">
                            <?php
                                if(isset($_SESSION['invalidUser'])){
                                    ?>
                                    <p><?php echo $_SESSION['invalidUser'];?></p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $pass?>">
                            <?php
                                if(isset($_SESSION['invalidPass'])){
                                    ?>
                                    <p><?php echo $_SESSION['invalidPass'];?></p>
                            <?php
                                }
                            ?>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-custom">Submit</button>
                        <div class="error-message">
                            <h5></h5>
                        </div>
                        <div class="reg-area">
                            <a href="../layouts/registration.php">Don't have an Account? Click Here.</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </section>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
