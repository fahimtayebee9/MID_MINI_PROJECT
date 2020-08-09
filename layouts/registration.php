<?php
    include "../Php/DB_Config.php";
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
                    <div class="row">
                        <div class="col-10">
                            <h1>***Registration***</h1>
                        </div>
                    </div>
                    <form action="../Php/register_validation.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required="required" value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; }?>">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required="required" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?>">
                            <?php
                                session_start();
                                if(isset($_SESSION['errorEmail'])){
                                    ?>
                                    <h5><?php echo $_SESSION['errorEmail'];?></h5>
                            <?php
                                
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required="required" value="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; }?>">
                            <?php
                                if(isset($_SESSION['errorText2'])){
                                    ?>
                                    <p class="errorText"><?php echo $_SESSION['errorText2'];?></p>
                                    <p class="suggestText"><?php echo 'Suggested Username : '.$_SESSION['suggest'];?></p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <input name="gender" type="radio" value="Male">Male
                            <input name="gender" type="radio" value="FeMale">Female
                            <input name="gender" type="radio" value="Other">Other
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>    
                            <input type="text" size="2" name="day"/>/
                            <input type="text" size="2" name="month" />/
                            <input type="text" size="4" name="year" />
                            <font size="2"><i>(dd/mm/yyyy)</i></font>
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <select name="user_type" class="">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register" class="btn btn-primary" value="Confirm">
                            <a href="../layouts/login.php" class="btn btn-primary">Login</a>
                        </div>
                        <div class="error-Area">
                            <?php
                                if(isset($_SESSION['errorMessage'])){
                            ?>
                                <p><?php echo $_SESSION['errorMessage'];?></p>
                            <?php
                                }
                            ?>
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

