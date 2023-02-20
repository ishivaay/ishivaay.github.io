<!DOCTYPE HTML>
<html>
    <head>
        <title> Sign up | Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="sign.css">
    </head>
    <body>
        <div class="base-section-area-01">
            <div class="base-section-area-001">
                <div class="title-sign">
                    SIGNUP
                </div>

                <div class="user-input">
                <?php
                    $_SESSION['user_name'] = $_SESSION['user_mail'] = $_SESSION['user_contact'] = $_SESSION['user_password'] = $_SESSION['user_cpassword'] = "";  //variable declaration for initial values of all input fields
                ?>
                    <form enctype="multipart/form-data" method="POST" class="user-input-form">
                    <?php
                            
                
                            if(isset($_POST['signup'])){

                               $user_name = $_POST['name'];
                               $_SESSION['user_name'] = $user_name;
                               $user_mail = $_POST['usermail'];
                               $_SESSION['user_mail'] = $user_mail;
                               $user_contact = $_POST['contact'];
                               $_SESSION['user_contact'] = $user_contact;
                               $user_password = $_POST['password'];
                               $user_cpassword = $_POST['confirm_password'];

                               if(empty($user_name)){
                                echo "<p class='user-alert'> Please enter your Name </p>";
                               }
                               else{
                                   if(empty($user_mail)){
                                    echo "<p class='user-alert'> Please enter your Email </p>";
                                    }
                                    else{
                                        if(empty($user_contact)){
                                            echo "<p class='user-alert'> Please enter your Contact </p>";
                                        }
                                        else{
                                            if(empty($user_password)){
                                                echo "<p class='user-alert'> Please enter your Password </p>";
                                            }
                                            else{
                                                if(empty($user_cpassword)){
                                                    echo "<p class='user-alert'> Please re-enter your password </p>";
                                                }
                                                else{
                                                    if(!($user_password==$user_cpassword)){
                                                        echo "<p class='user-alert'> Password didn't match </p>";
                                                    }
                                                    else{

                                                        $host_name = "sql208.epizy.com";
                                                        $root_directory = "epiz_32669113";
                                                        $password = "dqCbE6nV6BH";
                                                        $database_name = "epiz_32669113_login_info";
                                                        $database_connect = mysqli_connect($host_name,$root_directory,$password,$database_name);
                                                        $query_for_username = "SELECT * FROM user_info WHERE Username='$username'";
                                                        $query = mysqli_query($database_connect,$query_for_username);

                                                        if(mysqli_num_rows($query)==0){  
                                                            $host_name = "sql208.epizy.com";
                                                            $root_directory = "epiz_32669113";
                                                            $password = "dqCbE6nV6BH";
                                                            $database_name = "epiz_32669113_login_info";


                                                            $database_connection = mysqli_connect($host_name,$root_directory,$password,$database_name);

                                                            

                                                            $user_name = mysqli_real_escape_string($database_connection,$_POST['name']);
                                                            $user_username = mysqli_real_escape_string($database_connection,$_POST['usermail']);
                                                            $user_contact = mysqli_real_escape_string($database_connection,$_POST['contact']);
                                                            $user_password = mysqli_real_escape_string($database_connection,$_POST['password']);
                                                            $secure_paassword = SHA1($user_password);

                                                            $entry_in_databse = "INSERT INTO user_info(Username, Usermmail, Usermobile, Password) VALUES('$user_name','$user_mail','$user_contact','$secure_paassword')";
                                                            mysqli_query($database_connection,$entry_in_databse);
                                                            mysqli_close($database_connection);
                                                            echo "<h2>Account Created Successfully!</h2>";
                                                        }
                                                        else{
                                                            echo "<p class='user-alert'> Email already exits </p>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                               }
                               
                            }
                        ?>
                    
                        <input type="text" name="name" value="<?php  echo $_SESSION['user_name']; ?>" class="sign-entry name-entry" placeholder="Enter your name"><br>
                        
                        <input type="mail" name="usermail" value="<?php echo $_SESSION['user_mail']; ?>" class="sign-entry usermail-entry" placeholder="Enter your Email"><br>

                        <input type="text" name="contact" value="<?php echo $_SESSION['user_contact']; ?>" maxlength="10" class="sign-entry contact-entry" placeholder="Enter your Mobile"><br>
                        <input type="password" name="password" value="<?php echo $_SESSION['user_password']; ?>"  class="sign-entry password-entry" placeholder="Enter your Password"><br>
                        <input type="text" name="confirm_password" value="<?php echo $_SESSION['user_cpassword']; ?>" class="sign-entry confirm-password-entry" placeholder="Confirm password"><br>
                        <input type="submit" value="SIGNUP" name="signup" class="sign-entry submit-entry">
                        
                    </form>

                    <div class="user-section-login">
                        <span> Already have an account <a href="index.php"> Login </a></span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>