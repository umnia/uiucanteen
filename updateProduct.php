<?php
error_reporting(E_PARSE | E_ERROR);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Products</title>
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
                    <a href="updateProduct.php?a=logout" style="color: orangered;">
                        <strong>Logout</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ fresh sign web top bar -->
            <header>
                <h1 style="color: orangered;"><span></span>All Sells Record</h1>

            </header> 

            <div  class="form" style="background-color: orangered;" >
                <form id="contactform" action="updateProduct.php" method="post"> 

                    <a href="updateProduct.php?type=drinks"><strong>Drinks/Beverage</strong></a> | <a href="updateProduct.php?type=lunch"><strong>Lunch</strong></a> | <a href="updateProduct.php?type=fastfood"><strong>Fast Food</strong></a>
                </form>
            </div>
            <table width="100%" border="1">
                <tr> 
                    <td><strong><font color="orangered">Product Name</font></strong></td>
                    <td><strong><font color="orangered">Product Price</font></strong></td>
                    <td><strong><font color="orangered">Available Quantity</font></strong></td>
                    <td><strong><font color="orangered">Product Description</font></strong></td>
                    <td><strong><font color="orangered">Product Image</font></strong></td>
                    <td><strong><font color="orangered"></font></strong></td>
                </tr>
                <?PHP
                session_start();

                $user = $_SESSION['login_user'];
                $user2 = $_SESSION['login_admin_email'];

                if ($user2 == NULL) {

                    header("location: index.php");
                }

                if (isset($_REQUEST['a']) == 'logout') {


                    session_destroy();
                    header("location: index.php");
                }

                if (isset($_REQUEST['type']) != NULL && ($_REQUEST['type']) == 'drinks') {

                    $connection = mysql_connect("localhost", "root", "", "ekhacuvl_uiu_canten");

                    $db = mysql_select_db("ekhacuvl_uiu_canten", $connection);

                    $sql = "SELECT * FROM `drinks_item`";

                    $query = mysql_query($sql, $connection);

                    while ($row = mysql_fetch_array($query)) {
                        ?>
                        <tr> 
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['product_price']; ?></td>
                            <td><?php echo $row['product_quantity']; ?></td>
                            <td><?php echo $row['product_discription']; ?></td>
                            <td><?php echo $row['product_image']; ?></td>

                            <td><a href="updateDrinksInfo.php?id=<?php echo $row['id']?>&& type=drinks"<strong>Update</strong></a></td>
                        </tr>

                        <?php
                    }
                    mysql_close($connection);

                  
                }


                 else if(isset($_REQUEST['type']) != NULL && ($_REQUEST['type']) == 'lunch' ){

                  $connection = mysql_connect("localhost", "root","", "ekhacuvl_uiu_canten");

                  $db = mysql_select_db("ekhacuvl_uiu_canten", $connection);

                  $sql = "SELECT * FROM `lunch_item`";

                  $query = mysql_query($sql, $connection);

                  while($row=mysql_fetch_array($query))
                  {
                  ?>
                  <tr>
                  <td><?php echo $row['product_name']; ?></td>
                  <td><?php echo $row['product_price']; ?></td>
                  <td><?php echo $row['product_quantity']; ?></td>
                  <td><?php echo $row['product_discription']; ?></td>
                  <td><?php echo $row['product_image']; ?></td>

                  <td><a href="updateDrinksInfo.php?id=<?php echo $row['id']?>&& type=lunch"<strong>Update</strong></a></td>
                  </tr>
                  <?php
                  }
                  mysql_close($connection);
                  }

                  else if(isset($_REQUEST['type']) != NULL && ($_REQUEST['type']) == 'fastfood' ){

                  $connection = mysql_connect("localhost", "root","", "ekhacuvl_uiu_canten");

                  $db = mysql_select_db("ekhacuvl_uiu_canten", $connection);

                  $sql = "SELECT * FROM `fastfood_item`";

                  $query = mysql_query($sql, $connection);

                  while($row=mysql_fetch_array($query))
                  {
                  ?>
                  <tr>
                  <td><?php echo $row['product_name']; ?></td>
                  <td><?php echo $row['product_price']; ?></td>
                  <td><?php echo $row['product_quantity']; ?></td>
                  <td><?php echo $row['product_discription']; ?></td>
                  <td><?php echo $row['product_image']; ?></td>

                  <td><td><a href="updateDrinksInfo.php?id=<?php echo $row['id']?>&& type=fastfood"<strong>Update</strong></a></td>
                  </tr>
                  <?php
                  }
                  mysql_close($connection);
                  }
                 
                ?>

