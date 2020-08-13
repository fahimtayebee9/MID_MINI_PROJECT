<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Change Password</legend>
        <h4>Id : <?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}?></h4>
        <form action="../php/change_password.php" method="POST">
            <table>
                <tr>
                    <td><label>Current Password</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="cur_password" class="form-control" required="required"></td>
                </tr>
                <tr>
                    <td><label>New Password</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="new_password" class="form-control" required="required"></td>
                </tr>
                <tr>
                    <td><label>Confirm Password</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="confirm_password" class="form-control" required="required"></td>
                </tr>
                <tr>
                    <td><hr></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="change" class="" value="Change">
                        <a href="admin_home.php">Home</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                            if(isset($_SESSION['passError'])){
                                unset($_SESSION['success']);
                        ?>
                            <p><?php echo $_SESSION['passError'];?></p>
                        <?php
                            }
                            else if(isset($_SESSION['success'])){
                                unset($_SESSION['passError']);
                        ?>
                                <p><?php echo $_SESSION['success'];?></p>
                        <?php
                            }
                            unset($_SESSION['passError']);
                            unset($_SESSION['success']);
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>
