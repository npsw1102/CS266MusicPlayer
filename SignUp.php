<?php 
session_start();
require('server.php'); 

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Classic Login Form Example</title>
    <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
    <link rel="stylesheet" href="./sign up.css">
    <link rel="stylesheet" href="https://use.typekit.net/oxr3hup.css">
	<link rel="stylesheet" type="text/css" href="./base.css" />
</head>

<body>
   

<form action="SignUp_db.php"  method="post">

<!-- notification message -->
<?php if (isset($_SESSION['error'])) : ?>
        <div class="errors">
        <h1>
            <?php alert("Email already exists");
                  unset($_SESSION['error']);
            ?>
            
        </h1>
        </div>
        <?php endif ?>


    <div class="content">
        <section class='login' id='login'>
            <div class='head'>
                <h1 class='company'>Sign up</h1>
            </div>

            <div class='form'>
                <form>
                    
                    <input type="text" placeholder='Username' class='text' id='uname'name="uname" required><br> <br>

                    <input type="text" placeholder='Email' class='text' id='email' name="email" required><br><br>

                    <input type="password" placeholder='password' class='password' name="password"><br>

                    <div class="clearfix supporter"
                        style="padding-top: 30px; align-items: center; text-align: center;">
                        <button type="submit" name="reg_user" class="btn-login">Sign Up</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

</form>



    <footer>

    </footer>
   

</body>

</html>