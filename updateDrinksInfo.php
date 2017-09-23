<?php
error_reporting(E_PARSE | E_ERROR);

if($_GET['type']=='drinks'){
$connection = mysql_connect("localhost", "root", "", "ekhacuvl_uiu_canten");

                    $db = mysql_select_db("ekhacuvl_uiu_canten", $connection);

                    $sql = "SELECT * FROM `drinks_item` where id=".$_GET['id'];

                    $query = mysql_query($sql, $connection);

                    while ($row = mysql_fetch_array($query)) {
                       $_SESSION['product_name']=  $row['product_name']; 
                       $_SESSION['product_price']=  $row['product_price']; 
                       $_SESSION['product_quantity']=  $row['product_quantity']; 
                       $_SESSION['product_discription']=  $row['product_discription'];
                       $_SESSION['product_image']=  $row['product_image'];              
                    }
                    $_SESSION['menu']=  "abc"; 
                    mysql_close($connection);
                    
                    
}
else if($_GET['type']=='lunch'){
    
    $connection = mysql_connect("localhost", "root", "", "ekhacuvl_uiu_canten");

                    $db = mysql_select_db("ekhacuvl_uiu_canten", $connection);

                    $sql = "SELECT * FROM `lunch_item` where id=".$_GET['id'];

                    $query = mysql_query($sql, $connection);

                    while ($row = mysql_fetch_array($query)) {
                       $_SESSION['product_name']=  $row['product_name']; 
                       $_SESSION['product_price']=  $row['product_price']; 
                       $_SESSION['product_quantity']=  $row['product_quantity']; 
                       $_SESSION['product_discription']=  $row['product_discription'];
                       $_SESSION['product_image']=  $row['product_image']; 
                    }
                    mysql_close($connection);
                    
}
else if($_GET['type']=='fastfood'){
    $connection = mysql_connect("localhost", "root", "", "ekhacuvl_uiu_canten");

                    $db = mysql_select_db("ekhacuvl_uiu_canten", $connection);

                    $sql = "SELECT * FROM `fastfood_item` where id=".$_GET['id'];

                    $query = mysql_query($sql, $connection);

                    while ($row = mysql_fetch_array($query)) {
                       $_SESSION['product_name']=  $row['product_name']; 
                       $_SESSION['product_price']=  $row['product_price']; 
                       $_SESSION['product_quantity']=  $row['product_quantity']; 
                       $_SESSION['product_discription']=  $row['product_discription'];
                       $_SESSION['product_image']=  $row['product_image'];
                    }
                    mysql_close($connection);
}
if(isset($_REQUEST['submit'])){
    
            
        $newName=$_POST['product_name'];
        $newPrice=$_POST['product_price'];
        $newQuantity=$_POST['product_quantity'];
        $newDescription=$_POST['product_discription'];
        $newImage=$_POST['product_image'];
        
        if ($_POST['product_type']=='drinks'){
        
        $connection = new mysqli("localhost", "root", "", "ekhacuvl_uiu_canten");  
    
        $sql = "Update drinks_item SET product_name='$newName',product_price='$newPrice',product_quantity='$newQuantity',product_discription='$newDescription',product_image='$newImage' where id=".$_POST['product_id'];
        }
        else if ($_POST['product_type']=='lunch'){
        
        $connection = new mysqli("localhost", "root", "", "ekhacuvl_uiu_canten");  
    
        $sql = "Update lunch_item SET product_name='$newName',product_price='$newPrice',product_quantity='$newQuantity',product_discription='$newDescription',product_image='$newImage' where id=".$_POST['product_id'];
        }
        if ($_POST['product_type']=='fastfood'){
        
        $connection = new mysqli("localhost", "root", "", "ekhacuvl_uiu_canten");  
    
        $sql = "Update fastfood_item SET product_name='$newName',product_price='$newPrice',product_quantity='$newQuantity',product_discription='$newDescription',product_image='$newImage' where id=".$_POST['product_id'];
        }
        
        $query = $connection->query($sql);
        
        if($query == TRUE){
            echo '<script language="javascript">';
            echo 'alert("Item Updated")';
            echo '</script>';  
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Could not update the Item")';
            echo '</script>';
        }
        mysql_close($connection);
       
        window.location.replace('updateProduct.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Update Product Informations</title>
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
                   <a href="updateDrinksInfo.php?command=logout" style="color: orangered;">
                        <strong>Logout</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ fresh sign web top bar -->
			<header>
				<h1 style="color: orangered;"><span></span> Update the Item</h1>
                                
            </header>       
            
      <div  class="form" style="background-color: orangered;" >
          <form id="contactform" action="updateDrinksInfo.php" method="post"> 
                        
                        <input id="id" name="product_id" value="<?php echo $_REQUEST['id'] ?>" required="" tabindex="1" type="hidden" style="background-color: white;">
                        <input id="type" name="product_type" value="<?php echo $_REQUEST['type'] ?>" required="" tabindex="1" type="hidden" style="background-color: white;">
                        
                	<p class="contact"><label for="productName">Product Name:</label></p> 
                        <input id="name" name="product_name" value="<?php echo $_SESSION['product_name'] ?>" required="" tabindex="1" type="text" style="background-color: white;"> 
    			 
    			<p class="contact"><label for="productPrice">Product Price(Tk.):</label></p> 
    			<input id="price" name="product_price" value="<?php echo $_SESSION['product_price'] ?>" required="" tabindex="1" type="text" style="background-color: white;"> 
                
                        <p class="contact"><label for="quantityAvailable">Quantity Available:</label></p> 
    			<input id="quantity" name="product_quantity" value="<?php echo $_SESSION['product_quantity'] ?>" required="" tabindex="1" type="text" style="background-color: white;"> 
                
                        <p class="contact"><label for="productDescription">Product Description:</label></p> 
    			<input id="description" name="product_discription" value="<?php echo $_SESSION['product_discription'] ?>" required="" tabindex="1" type="text" style="background-color: white;"> 
    			 
                        
     <center>
         <input class="buttom" name="uploadBtn" id="submit" tabindex="5" value="Upload Image" onclick="window.open('https://www.imageupload.co.uk/')" style="background-color: green;" type="button"> 	 
  
                  <br>
    </center>
    
   <p class="contact"><label for="productImage">Product Image URL:</label></p> 
    			<input id="image" name="product_image" value="<?php echo $_SESSION['product_image'] ?>" required="" tabindex="1" type="text" style="background-color: white;"> 
                     
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Update" style="background-color: green;" type="submit">  	 
  
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
    
   
    
?>
