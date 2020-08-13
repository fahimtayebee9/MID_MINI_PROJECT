<?php
    include "../php/DB_Config.php";
    session_start();
    if(isset($_POST['register'])){
        $id                 = $_POST['id'];
        $name               = $_POST['name'];
        $email              = $_POST['email'];
        $password           = $_POST['password'];
        $role               = $_POST['user_type'];
        $confirmPassword    = $_POST['confirm_password'];
        $errorPassCode = 0;
        if(empty($id) ||empty($name) || empty($email) || empty($password) || empty($confirmPassword) || empty($role)){
            $_SESSION['errorMessage'] = "Please Insert All Informations...";
            $errorPassCode = 1;
            echo "Done...133";
            header('location: ../layouts/registration.php');
        }
        // Password Match Checking
        else if($password != $confirmPassword){
            $_SESSION['errorMessage2'] = "Password did not matched...";
            $errorPassCode = 1;
            echo "Done...12";
            header('location: ../layouts/registration.php');
        }
        else{
            $validName = validateName($name);
            $validEmail = validateEmail($email);
            $validPassword = validatePassword($password);
            $errorCode=NULL;
            if($validName == $validEmail = $validPassword){
                $sql = "SELECT email FROM user_test where id='$id';";
                $result = mysqli_query($db, $sql);
                $rowcount = mysqli_num_rows($result);
                if($rowcount > 0){
                    while($data = mysqli_fetch_assoc($result)){
                        $id_db    = $data['id'];
                        if($id == $id_db){
                            $_SESSION['errorText'] = 'User ID Already Exists!Try another User Id...';
                            header('location: ../layouts/registration.php');
                            break;
                        }
                    }
                }
                else{
                    $errorCode = 0;
                    $insert_query = "INSERT into user_test (id, password,name,email,userType) VALUES ( '$id', '$password', '$name', '$email', '$role')";
                    $add_user    = mysqli_query($db, $insert_query);
                    if($add_user){
                        $_SESSION['register'] = 'Registration Successful...';
                        header('location: ../layouts/login.php');
                    }
                    else{
                        echo "Not Registered..";
                    }
                }
            }
            else{
                header('location: ../layouts/registration.php');
            }
        }
    }

    // Name Validation : 1.Value Set, 2. Word Count > 2, 3.Characters from a-z or A-Z or '-', 4.Starts with a letter 
    function validateName($name){
        $valid = 0;
        if(isset($name) && str_word_count($name) >= 2){
            $name_array = str_split($name);
            foreach($name_array as $name_char){
                if($name_char >= 'a' || $name_char <= 'z' || $name_char >= 'A' || $name_char <= 'Z' || $name_char == '-' || $name_char == '.'){
                    $valid++;
                }
            }
            if($valid == strlen($name)){
                if($name_array[0] >= 'a' || $name_array[0] <= 'z' || $name_array[0] >= 'A' || $name_array[0] <= 'Z'){
                    $valid = 1;
                }
            }   
        }
        else{
            $_SESSION['errorText'] = "Name Must be 2 Characters...";
        }
        return $valid;
    }

    // Email Validation
    function validateEmail($email){
        $emailCode = 0;
        $validEmailCode = 0;
        if(isset($email)){
            $email_array = str_split($email);
            foreach($email_array as $email_char){
                if($email_char >= 'a' || $email_char <= 'z' || $email_char == '@' || $email_char == '.'){
                    $emailCode++;
                }
            }
            if($emailCode == strlen($email)){
                $validEmailCode = 1;
            }
        }
        return $validEmailCode;
    }

    // Password Validation
    function validatePassword($password){
        // $validPasswordCode = 0;
        if(strlen($password) >= 8){
            $validPasswordCode = 1;
        }
        // if($errorPassCode == 0){ }
        return $validPasswordCode;
    }
?>
