<?php include_once("header.php"); ?>

<?php 

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
        $query = "INSERT INTO storage(product_name,brand,quality,quantity,price,retail_price,total_price,date_added) VALUES('$productName','$brand','$quality','$quantity','$price','$retailPrice','$total','$timestamp')";
        $result = mysqli_query($mysqli, $query);


    }

}
?>


        <div class="page-container">
            <?php include_once("headernav.php"); ?>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-6"></div>
                        <div class="masonry-item col-md-6">
                            <div class="bgc-white p-20 bd">
                                <h6 class="c-grey-900">Add New Item</h6>
                                <div class="mT-30">
                                    <form class="login" action="newitem.php" method="post" name="form1">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="productName">Product Name</label>
                                                <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="brand">Brand</label>
                                                <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="quality">Quality</label>
                                                <input type="text" class="form-control" id="quality" name="quality" placeholder="Quality" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control" id="price" name="price" placeholder="Price" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="retailPrice">Retail Price</label>
                                                <input type="text" class="form-control" id="retailPrice" name="retailPrice" placeholder="Retail Price" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="total">Total</label>
                                            <input type="text" class="form-control" id="total" name="total" placeholder="Total" required>
                                        </div>
                                        <button type="submit" name="Submit" class="btn btn-right btn-primary">Add Item</button>
                                        <?php if(isset($_POST['Submit'])) { echo "<font color='green'>Item Added.</font><br/>";  } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once("footer.php"); ?>