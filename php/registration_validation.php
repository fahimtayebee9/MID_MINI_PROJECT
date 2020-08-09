<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userType = $_POST['user_type'];
        if(empty($name) || empty($password) || empty($userType) || empty($confirmPassword) || empty($email) || empty($id) ){
			echo "Invalid Submission...";
		}else {
			/*$_SESSION['uname'] 		= $uname;
			$_SESSION['email'] 		= $email;
			$_SESSION['password'] 	= $password;
			$_SESSION['user'] 		= $user;*/
            $file = fopen('user.txt', 'a');
            if($password == $confirmPassword){
                fwrite($file, $id.'|'.$password.'|'.$name.'|'.$email.'|'.$userType."\n");
                fclose($file);
                header('location: ../layouts/login.html');
            }
		}
    }
?>