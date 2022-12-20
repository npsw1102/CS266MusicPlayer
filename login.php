<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require('server.php'); 


function alert($msg) {
	echo "<script type='text/javascript'>alert('$msg');</script>";
}

error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Classic Login Form Example</title>
    <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="https://use.typekit.net/oxr3hup.css">
	<link rel="stylesheet" type="text/css" href="./base.css" />
</head>

<body>
    

    <form action="login_db.php"  method="post">
    <div class="content">
        <!-- <h2 class="content__title content__title--centered content__title--style-1">Fungible Love</h2> -->

        <!-- notification message -->
     <?php if (isset($_SESSION['error'])) : ?>
        <div class="errors">
        <h1>
            <?php alert("Wrong password try again!!");
                  unset($_SESSION['error']);
            ?>
            
        </h1>
        </div>
        <?php endif ?>

        <!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
        <h1>
            <?php alert("You can login now!!");
                  unset($_SESSION['success']);
            ?>
            
        </h1>
        </div>
        <?php endif ?>	
        
        <section class='login' id='login'>
            <div class='head'>
                <h1 class='company'>Login</h1>
            </div>

            <div class='form'>
                <form>
                    <input type="text" placeholder='Username' class='text' id='uname' name='uname' required><br><br>
                    <input type="password" placeholder='••••••••••••••' class='password' id='password' name ='password' required>

                    <div class="clearfix supporter">
                        <div class="pull-left remember-me">
                            <input id="rememberMe" type="checkbox" onclick="setcookie()">Remember Me
                           
                        </div>

                    </div>
                    <div class="clearfix supporter"
                        style="padding-top: 20px; align-items: center; text-align: center;">
                        <button type="submit" name="login_user" class="btn-login">LOGIN</button>

                    </div>
                    <div class="clearfix supporter"
                        style="padding-top: 30px; align-items: center; text-align: center;">
                        <a href="SignUp.php" class='btn-login' id='do-login'>Sign Up</a>

                    </div>
                </form>
            </div>
        </section>
    </div>
    </form>

    <script type="text/javascript">
        function setcookie(){
            var u = document.getElementById('uname').value;
            var p = document.getElementById('password').value;

            document.cookie="myusername="+u+";path=http://localhost/cs266/";
            document.cookie="mypswd="+p+";path=http://localhost/cs266/";
        }

        function getcookiedata(){

            console.log(document.cookie);

            var user=getCookie('myusername');
            var pswd=getCookie('mypsswd');

            document.getElementById('uname').value=user;
            document.getElementById('password').value=pswd;
        }

        function getCookie(cname){
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++){
                var c = ca[i];
                while (c.charAt(0) == ' '){
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0){
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

    </script>

    <footer>

    </footer>
   

</body>

</html>
