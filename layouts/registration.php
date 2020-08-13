<?php
    include "../Php/DB_Config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hotel Management System Portal</title>
    <style>
        .main-body{
            margin: auto;
        }
        fieldset{
            width: fit-content;
            margin: auto;
        }
        table{
            width: 100%;
            margin: auto;
        }
        tr{
            margin: 5px 0px;
        }
        input{
            padding: 5px 10px;
        }
        select{
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <section class="main-body">
        <fieldset>
            <legend>Registration</legend>
            <table> 
                <form action="../php/registration_validation.php" method="POST" enctype="multipart/form-data">
                    <tr>
                        <td> <label>Id</label> </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="id" class="form-control" required="required" value=""></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password" class="form-control" required="required"></td>
                    </tr>
                    <tr>
                        <td><label>Confirm Password</label></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="confirm_password" class="form-control" required="required"></td>
                    </tr>
                    <tr>
                        <td><label>Name</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" class="form-control" required="required"></td>
                    </tr>
                    <tr>
                        <td><label>Email Address</label></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="email" class="form-control" required="required" value=""></td>
                    </tr>
                    <tr>
                        <?php
                            session_start();
                            if(isset($_SESSION['errorEmail'])){
                                ?>
                                <td><p><?php echo $_SESSION['errorEmail'];?></p></td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td><label>User Type</label></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="user_type" class="">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="register" class="" value="Confirm">
                            <a href="../layouts/login.php">Login</a>
                        </td>
                    </tr>
                    <tr>
                        <?php
                            if(isset($_SESSION['errorMessage'])){
                                unset($_SESSION['register']);
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
                            else if(isset($_SESSION['errorText'])){
                                unset($_SESSION['errorMessage']);
                        ?>
                                <td><p><?php echo $_SESSION['errorText'];?></p></td>
                        <?php
                            }
                            unset($_SESSION['errorMessage']);
                            unset($_SESSION['errorText']);
                            unset($_SESSION['register']);
                        ?>
                    </tr>
                    </tr>
                </form>
            </table>
        </fieldset>
    </section>
    
</body>
</html>

