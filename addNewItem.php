<?php
error_reporting(E_PARSE | E_ERROR);
?>
<!DOCTYPE html>
<html>
<head>
<title>Add New Items</title>
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
                   <a href="addNewItem.php?command=logout" style="color: orangered;">
                        <strong>Logout</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ fresh sign web top bar -->
			<header>
				<h1 style="color: orangered;"><span></span> Post Your New Items</h1>
                                
            </header>       
            
      <div  class="form" style="background-color: orangered;" >
          <form id="contactform" action="addNewItem.php" method="post"> 
              
              <select class="select-style gender" name="type" id="type" >
            <option value="0">Choose your product type..</option>
            <option value="1">Drinks/Beverage</option>
            <option value="2">Lunch</option>
            <option value="3">Fast Food</option>
            </select><br><br>
    			<p class="contact"><label for="productName">Product Name:</label></p> 
    			<input id="name" name="product_name" placeholder="Enter your product name" required="" tabindex="1" type="text" style="background-color: white;"> 
    			 
    			<p class="contact"><label for="productPrice">Product Price(Tk.):</label></p> 
    			<input id="price" name="product_price" placeholder="Enter your product price" required="" tabindex="1" type="text" style="background-color: white;"> 
                
                        <p class="contact"><label for="quantityAvailable">Quantity Available:</label></p> 
    			<input id="quantity" name="product_quantity" placeholder="Enter your product quantity available" required="" tabindex="1" type="text" style="background-color: white;"> 
                
                        <p class="contact"><label for="productDescription">Product Description:</label></p> 
    			<input id="description" name="product_discription" placeholder="Enter your product description" required="" tabindex="1" type="text" style="background-color: white;"> 
    			 
                        
    <center>
        <input class="buttom" name="uploadBtn" id="submit" tabindex="5" value="Upload Image" onclick="window.open('https://www.imageupload.co.uk/')" style="background-color: green;" type="button"> 	 
  
                  <br>
    </center>
    
   <p class="contact"><label for="productImage">Product Image URL:</label></p> 
    			<input id="image" name="product_image" placeholder="Enter your product image url" required="" tabindex="1" type="text" style="background-color: white;"> 
                     
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Add Post" style="background-color: green;" type="submit"> 	 
  
                  <br>
          </form>
                  </div>
</div>
</body>
</html>
         
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
    
    if(isset($_POST['submit'])){
        
        $newName=$_POST['product_name'];
        $newPrice=$_POST['product_price'];
        $newQuantity=$_POST['product_quantity'];
        $newDescription=$_POST['product_discription'];
        $newImage=$_POST['product_image'];
        
        $selected_val = $_POST['type'];  // Storing Selected Value In Variable
       
        
        if($selected_val !=0 && $selected_val==1){
            
            
        $connection = new mysqli("localhost", "root", "", "ekhacuvl_uiu_canten");  
    
        $sql = "Insert into drinks_item(product_name,product_price,product_quantity,product_discription,product_image) Values('$newName','$newPrice','$newQuantity','$newDescription','$newImage')" ;
        
        }
       else if($selected_val !=0 && $selected_val==2){
            
            $connection = new mysqli("localhost", "root", "", "ekhacuvl_uiu_canten");  
    
        $sql = "Insert into lunch_item(product_name,product_price,product_quantity,product_discription,product_image) Values('$newName','$newPrice','$newQuantity','$newDescription','$newImage')" ;
        
        }
        
        else if($selected_val !=0 && $selected_val==3){
            
            
        $connection = new mysqli("localhost", "root", "", "ekhacuvl_uiu_canten");  
    
        $sql = "Insert into fastfood_item(product_name,product_price,product_quantity,product_discription,product_image) Values('$newName','$newPrice','$newQuantity','$newDescription','$newImage')" ;
        }
        
        $query = $connection->query($sql);
        
        if($query == TRUE){
            echo '<script language="javascript">';
            echo 'alert("New Item Added")';
            echo '</script>';  
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Could not add the Item")';
            echo '</script>';
        }
        mysql_close($connection);
       
        window.location.replace('addNewItem.php');
        
        
       
    }
    
?>
