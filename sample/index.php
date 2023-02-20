<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Login | Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="manifest" href="img/site.webmanifest">
    </head>
    <style>
        .user-empty-section{
            color:red;
            font-family: 'Titillium Web', sans-serif;
        }
    </style>
    <body>
       <div class="area-cover-temp area-section-01">
          <div class="area-cover-temp area-section-02">
              <div class="title-log">
                  LOGIN
              </div>

              <div class="user-input">
                    <form enctype="multipart/form-data" method="POST" class="user-input-form">
                        <input type="text" name="usermail" class="login-entry name-entry" placeholder="Email"><br>
                        <input type="password" name="password" class="login-entry pass-entry" placeholder="Password"><br>

                <?php
                    if(isset($_POST['login'])){

                        $usermail = $_POST['usermail'];
                        $password = $_POST['password'];
                        if( (empty($usermail)) && (empty($password)) ){
                            echo "<p class='user-empty-section'>Email and password can not be empty!</p>";
                        }
                        else{                        
                            $host_name = "sql208.epizy.com";
                            $root_directory = "epiz_32669113";
                            $password = "dqCbE6nV6BH";
                            $database_name = "epiz_32669113_login_info";


                            $database_connection = mysqli_connect($host_name,$root_directory,$password,$database_name);

                            $usermail = mysqli_real_escape_string($database_connection,$_POST['usermail']);
                            $password = mysqli_real_escape_string($database_connection,$_POST['password']);
                            $secure_paassword = SHA1($password);

                            $check_login_status = "SELECT * FROM user_info WHERE Usermmail='$usermail' && Password='$secure_paassword'";

                            $query = mysqli_query($database_connection,$check_login_status);

                            if(mysqli_num_rows($query)>=1)
                            {
                                    ?><script>
                                        window.location.href='http://webdomain.rf.gd/lexample/dashboard.php';
                                    </script><?php

                                $session_variable = $_POST['usermail'];
                                $session_variable1 = $_POST['password'];
                                $_SESSION['usermail'] = $session_variable;
                                $_SESSION['password'] = $session_variable1;
                            }
                            else{
                                echo "<p class='user-empty-section'> Please Enter a valid Email or password! </p>";
                            }
                        }
                    }
                ?>
                        <input type="submit" Value="LOGIN" name="login" class="login-entry submit-entry">
                   </form>


                  <div class="user-section-create-account">
                      <span> Don't have an account? <a href="signup.php"> Signup </a> </span>
                  </div>
              </div>
          </div>
       </div>
    </body>
</html>
<script src="https://apis.google.com/js/platform.js" async defer></script>