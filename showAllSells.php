<?php
error_reporting(E_PARSE | E_ERROR);
?>
<!DOCTYPE html>
<html>
<head>
<title>Show All Sells</title>
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
                   <a href="showAllSells.php?a=logout" style="color: orangered;">
                        <strong>Logout</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ fresh sign web top bar -->
            <header>
				<h1 style="color: orangered;"><span></span>All Sells Record</h1>
                                
            </header>       
<table width="100%" border="1">
        <tr> 
          <td><strong><font color="orangered">Order Date</font></strong></td>
          <td><strong><font color="orangered">Faculty Name</font></strong></td>
           <td><strong><font color="orangered">Room No.</font></strong></td>
          <td><strong><font color="orangered">Email</font></strong></td>
          <td><strong><font color="orangered">Phone</font></strong></td>
          <td><strong><font color="orangered">Item</font></strong></td>
          <td><strong><font color="orangered">Total Price</font></strong></td>

        </tr>
  <?PHP
  
  
  session_start();
                
                $user = $_SESSION['login_user'];
   $user2 = $_SESSION['login_admin_email'];
    
   if($user2==NULL){
       
       header("location: index.php");
   } 
  
  if(isset($_REQUEST['a']) == 'logout'){              
        
        
       session_destroy(); 
       header("location: index.php"); 
    }
  
    $connection = mysql_connect("localhost", "root","", "ekhacuvl_uiu_canten");
    
    $db = mysql_select_db("ekhacuvl_uiu_canten", $connection);  
    
    $sql = "SELECT * FROM `sells`";
    
    $query = mysql_query($sql, $connection);
   
    while($row=mysql_fetch_array($query))
    {
    ?>
        <tr> 
          <td><?php echo $row['order_date']; ?></td>
          <td><?php echo $row['faculty_name']; ?></td>
          <td><?php echo $row['faculty_room']; ?></td>
          <td><?php echo $row['faculty_mail']; ?></td>
          <td><?php echo $row['faculty_phone']; ?></td>
          <td><?php echo $row['total_item_info']; ?></td>
          <td><?php echo $row['total_price']; ?></td>
        
        </tr>
  <?php
  }
  mysql_close($connection);
  
  ?>

       
