<?php
error_reporting(E_PARSE | E_ERROR);
?>
<!DOCTYPE html>
<html>
<head>
<title>Show All Orders</title>
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
                   <a href="showAllOrder.php?a=logout" style="color: orangered;">
                        <strong>Logout</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ fresh sign web top bar -->
            <header>
				<h1 style="color: orangered;"><span></span>All Orders</h1>
                                
            </header>       
<table width="100%" border="1">
        <tr> 
          
          <td><strong><font color="orangered">Faculty Name</font></strong></td>
          <td><strong><font color="orangered">Item</font></strong></td>
          <td><strong><font color="orangered">Total Price</font></strong></td>
          <td><strong><font color="orangered">Room No.</font></strong></td>
          <td><strong><font color="orangered">Email</font></strong></td>
          <td><strong><font color="orangered">Phone</font></strong></td>
          <td><strong><font color="orangered">Order Date</font></strong></td>
          <td><strong><font color="orangered"></font></strong></td>
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
  
    $connection = mysql_connect("localhost", "root","","ekhacuvl_uiu_canten");
    
    $db = mysql_select_db("ekhacuvl_uiu_canten", $connection);  
    
    $sql = "SELECT * FROM `order`";
    
    $query = mysql_query($sql, $connection);
   
    while($row=mysql_fetch_array($query))
    {
    ?>
        <tr> 
         
          <td><?php echo $row['faculty_name']; ?></td>
          <td><?php echo $row['total_item_info']; ?></td>
          <td><?php echo $row['total_price']; ?></td>
          <td><?php echo $row['faculty_room']; ?></td>
          <td><?php echo $row['faculty_mail']; ?></td>
          <td><?php echo $row['faculty_phone']; ?></td>
          <td><?php echo $row['order_date']; ?></td>
          

          <td><a href="showAllOrder.php?id=<?php echo $row['id']; ?>&command=approve"><strong>Approve</strong></a> | <a href="showAllOrder.php?id=<?php echo $row['id']; ?>&command=delete"><strong>Discard</strong></a></td>
        </tr>
  <?php
  }
  mysql_close($connection);
  
  
  
  if(isset($_REQUEST['id']) != NULL && $_REQUEST['command']=='approve'){              
        
        $connection = new mysqli("localhost", "root", "", "ekhacuvl_uiu_canten");  
        
        $sql = "Insert into sells(faculty_name,total_item_info,total_price,faculty_room,order_date,faculty_mail,faculty_phone) Select faculty_name,total_item_info,total_price,faculty_room,order_date,faculty_mail,faculty_phone from `order` where id =" . $_REQUEST['id'] ;
        
        $query = $connection->query($sql);
        
        if($query == TRUE){
            
            mysql_close($connection);
            
            $connection = new mysqli("localhost", "root", "", "ekhacuvl_uiu_canten");
            //NEED to update confirmation in Order Table
            $yesMsg="Yes";
            $sql1="Update `order` Set confirmation='Yes'  where id =" . $_REQUEST['id'];
            
            $query1 = $connection->query($sql1);
            
            if($query1==TRUE){
                
                mysql_close($connection);
            
            $connection = new mysqli("localhost", "root", "", "ekhacuvl_uiu_canten");
                
                 $sql3 = "Select total_item_info from `order` where id =" . $_REQUEST['id'] ;
        
                $query2 = $connection->query($sql3);
                
                while ($row=mysqli_fetch_array($query2)){
                    
                    $total_item_info=$row['total_item_info'];
                }
                $total_item_info="Burger 4,Tea 5";
                $item_info = explode(",", $total_item_info);
                for($i=0;$i<sizeof( $item_info); $i++)
                {
                    $item = explode(" ", $item_info[$i]);
                    
                }
                
               
                echo '<script language="javascript">';
                echo 'alert("'.$item.'")';
                echo '</script>';  
            }
                           

        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Could not add Order to Sells")';
            echo '</script>';
        }
        
        
        //Need to reduce value from the availability
        
        mysql_close($connection);
        
        
       window.location.replace('showAllOrder.php'); 
    }
  
    if(isset($_REQUEST['id']) != NULL && $_REQUEST['command']=='delete'){              
        
        $connection = new mysqli("localhost", "root", "", "ekhacuvl_uiu_canten");  
    
        $sql = "delete FROM `order` where id =" . $_REQUEST['id'] ;
        
        $query = $connection->query($sql);
        
        if($query == TRUE){
            echo '<script language="javascript">';
            echo 'alert("Order Deleted")';
            echo '</script>';  
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Could not delete the Order")';
            echo '</script>';
        }
        mysql_close($connection);
        
       window.location.replace('showAllOrder.php');
    }
  
  ?>

       
