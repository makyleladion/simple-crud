<?php 
include_once("config.php");

if(isset($_POST['Submit'])) {
	 $productName = mysqli_real_escape_string($mysqli, $_POST['productName']);
	 $brand = mysqli_real_escape_string($mysqli, $_POST['brand']);
	 $quality = mysqli_real_escape_string($mysqli, $_POST['quality']);
	 $quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
	 $price = mysqli_real_escape_string($mysqli, $_POST['price']);
	 $retailPrice = mysqli_real_escape_string($mysqli, $_POST['retailPrice']);
	 $total = mysqli_real_escape_string($mysqli, $_POST['total']);

	 if (empty($productName)) {
	 	if(empty($productName)) {
	      	echo "<font color='red'>Entry Number is empty.</font><br/>";
	    }
	    echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	 } else { 
    // if all the fields are filled (not empty) 
	    $timestamp = date('Y-m-d H:i:s');
	    //insert data to database 
	    $result = mysqli_query($mysqli, "INSERT INTO storage(product_name,brand,quality,quantity,price,retail_price,total_price,date_added) VALUES('$productName','$brand','$quality','$quantity','$price','$retailPrice','$total','$timestamp')");

	    echo "<font color='green'>Item Added.</font><br/>";

    }

}
?>