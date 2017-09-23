<?php
error_reporting(E_PARSE | E_ERROR);
?>
<!DOCTYPE html>
<html>
<head>
<title>Canteen Profile</title>
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
                <a href="canteenProfile.php" style="color: orangered;"><strong>HOME</strong></a>
               <span class="right">
                   <a href="canteenProfile.php?command=logout" style="color: orangered;">
                        <strong>Logout</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ fresh sign web top bar -->
			<header>
				<h1 style="color: orangered;"><span></span> Post Your New Items</h1>
                                
            </header>   
    
     <?php
   session_start();
   
   $user = $_SESSION['login_user'];
   $user2 = $_SESSION['login_admin_email'];
    
   if($user2==NULL){
       
       header("location: index.php");
   } 
   
   if(isset($_REQUEST['command']) == 'logout'){              
        
        
       session_destroy(); 
       header("location: index.php"); 
    }
    
    echo "<center><h1>Hi! $user you have logged in successfully</h1><center><br></br>";
    
    
    ?>
            <strong><a href="addNewItem.php">Add New Post</a></strong><br></br>
            <strong><a href="updateProduct.php">Update Product Informations</a></strong><br></br>
            <strong><a href="showAllOrder.php">Show All Orders</a></strong><br></br>
            <strong><a href="showAllSells.php">Show All Sells</a></strong><br></br>
            
</body>                         
</html>