<?php
session_start();
if(!isset($_SESSION['usermail']))
{
	header('location:index.php');
}
?>
<?php   
    if(isset($_POST['logout_session']))
    {
        session_destroy();  
        exit(header('location:index.php'));
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> Sign up | Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="sign.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="base-section-area-01">
            <div class="base-section-area-001">
                <div class="title-sign">
                    Logged in
                </div>

                <div class="user-input">
                    <?php
                        $login_user = $_SESSION['usermail'];

                        //collecting user info from Database for profile
                        $host_name = "sql208.epizy.com";
                        $root_directory = "epiz_32669113";
                        $password = "dqCbE6nV6BH";
                        $database_name = "epiz_32669113_login_info";

                        $databse_connectionp = mysqli_connect($host_name,$root_directory,$password,$database_name);

                        $user_profile_name = "SELECT * FROM user_info WHERE Usermmail='$login_user'";
                        $query = mysqli_query($databse_connectionp,$user_profile_name);
                        $Name = mysqli_fetch_row($query);

                        echo "<div class='user-name-pro' style='color:green;'> <span>Welcome : ". $Name[1]."</span> </div>";
                        echo "<div class='user-name-pro' style='color:green;'> <span>Your Mail is : ". $Name[2]."</span> </div>";
                        echo "<div class='user-name-pro' style='color:green;'> <span>Your Conact Number : ". $Name[3]."</span> </div>";
                    ?>

                    <div class="user-section-login">
                        <span>
                            <form method="post">
                                <button style="margin: 25px 50px;cursor: pointer;padding: 5px 8px;background: transparent;color: green;border: 1px solid red;border-radius: 5px;font-size: large;" class="logout-session" type="submit" name="logout_session">
                                    <i class="fa fa-sign-out"></i> Logout
                                </button>
                            </form>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>