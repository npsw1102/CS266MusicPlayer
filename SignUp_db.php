<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require('server.php'); 

    function alert($msg) {
        echo "<script type='text/javascript'> alert('$msg'); </script>";
    }

    $errors = array();


    
    if(isset($_POST['reg_user'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['uname']);

        $user_check_query = "SELECT * FROM users WHERE Email = '$email' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        

        if($result){
            if ($result['Email'] === $email){
                array_push($errors, "Email already exists");
            }

        }

        if(count($errors)==0){
            $password = md5($password);

            $sql = "INSERT INTO users (Username,email,password) VALUES ('$username','$email','$password')";
            mysqli_query($conn,$sql);

            $_SESSION['success'] = "You can login now";
            header('location: login.php');
        
        }  else{
            $_SESSION['error'] = "Email already exists";
            header('location: SignUp.php');
            
        }
        
    }


?>