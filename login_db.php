<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require('server.php');

    $errors = array();

    if(isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['uname']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }

    if(count($errors)==0){
        $password = md5($password);
        $query = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password' ";
        $result = mysqli_query($conn,$query);
        
        if (mysqli_num_rows($result)!=0){
            $row=mysqli_fetch_array($result);
            $_SESSION['UserID']=$row['UserID']; 
            $_SESSION['Email']=$row['Email'];
            $_SESSION['Username']=$row['Username'];
            header('location: index.php');

        } else{
            array_push($errors, "Wrong email/password combination");
            $_SESSION['error'] = "Wrong username/password try again!!";
            header('location: login.php');
        }
    }

?>