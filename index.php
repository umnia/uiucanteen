<?php
error_reporting(E_PARSE | E_ERROR);
?>
<!DOCTYPE html>
<html>
<head>
<title>UIU Canteen Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<body>
<div class="container">
			<!-- fresh sign web top bar -->
            <div class="freshdesignweb-top" style="background-color: silver;">
               
                <div class="clr"></div>
            </div><!--/ fresh sign web top bar -->
			<header>
				<h1 style="color: orangered;"><span></span> Welcome to UIU Canteen</h1>
                                <img src="Images/Untitled.png" title="profile pic"/>
                                
            </header>       
            
      <div  class="form" style="background-color: orangered;" >
          <form id="contactform" action="index.php" method="post"> 
              
    			<p class="contact"><label for="admin_email">Email:</label></p> 
    			<input id="name" name="admin_email" placeholder="Enter your email id" required="" tabindex="1" type="text" style="background-color: white;"> 
    			 
    			<p class="contact"><label for="password">Password:</label></p> 
                        <input id="price" name="password" placeholder="Enter your password" required="" tabindex="1" type="password" style="background-color: white;"> 
                
                         
            
    <center>
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Login" style="background-color: green;" type="submit"> 	 
  
                  <br>
    </center>
    
                  </div>
</div>

<?php
                session_start(); // Starting Session
                $error=''; // Variable To Store Error Message
                if (isset($_POST['submit'])) {
                    
                        if (empty($_POST['admin_email']) || empty($_POST['password'])) {
                                $error = "Id or Password is invalid";
                        }
                        else
                        {
                            // Define $username and $password
                            $admin_email=$_POST['admin_email'];
                            $password=$_POST['password'];
                        
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
                            $connection = mysql_connect("localhost", "root", "","ekhacuvl_uiu_canten");
// To protect MySQL injection for Security purpose
                            $admin_email = stripslashes($admin_email);
                            $password = stripslashes($password);
                            $admin_email = mysql_real_escape_string($admin_email);
                            $password = mysql_real_escape_string($password);
// Selecting Database
                            $db = mysql_select_db("ekhacuvl_uiu_canten", $connection);
// SQL query to fetch information of registerd users and finds user match.
                            $query = mysql_query("select * from admin where password='$password' AND admin_email='$admin_email'", $connection);
                            $username = mysql_fetch_array($query);
                            $rows = mysql_num_rows($query);
                            if ($rows == 1) {
                                $_SESSION['login_user']=$username['admin_name']; // Initializing Session
                                $_SESSION['login_admin_email']=$username['admin_email']; // Initializing Session
                                header("location: canteenProfile.php"); // Redirecting To Other Page
                            } 
                            else {
                                echo '<script language="javascript">';
                                echo 'alert("Please insert correct user email or password")';
                                echo '</script>';
                            }
                            mysql_close($connection); // Closing Connection
                    }
                }
?> 