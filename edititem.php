<?php include_once("header.php"); ?>

<?php 

if(isset($_POST['update']))
{   
     $id = mysqli_real_escape_string($mysqli, $_POST['id']);
     $productName = mysqli_real_escape_string($mysqli, $_POST['productName']);
     $brand = mysqli_real_escape_string($mysqli, $_POST['brand']);
     $quality = mysqli_real_escape_string($mysqli, $_POST['quality']);
     $quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
     $price = mysqli_real_escape_string($mysqli, $_POST['price']);
     $retailPrice = mysqli_real_escape_string($mysqli, $_POST['retailPrice']);
     $total = mysqli_real_escape_string($mysqli, $_POST['total']);   
    
    // checking empty fields
    if(empty($id)) {  
            
        if(empty($id)) {
            echo "<font color='red'>ID cannot be Found.</font><br/>";
        }
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE storage SET product_name='$productName',brand='$brand',quality='$quality',quantity='$quantity',price='$price',retail_price='$retailPrice',total_price='$total' WHERE id=$id");


        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>

<?php
    //getting id from url
    $id = $_GET['id'];

    //selecting data associated with this particular id
    $result = mysqli_query($mysqli, "SELECT * FROM storage WHERE id=$id");

    while($res = mysqli_fetch_array($result))
    {
        $productName = $res['product_name'];
        $brand = $res['brand'];
        $quantity = $res['quantity'];
        $quality = $res['quality'];
        $price = $res['price'];
        $retailPrice = $res['retail_price'];
        $total = $res['total_price'];
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

                                <h6 class="c-grey-900">Edit Item <?php echo $id;?></h6>
                                <div class="mT-30">
                                    
                                    <form action="edititem.php" method="post" name="form1">

                                        <div class="form-row">
                                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $id;?>" hidden>
                                            <div class="form-group col-md-6">
                                                <label for="productName">Product Name</label>
                                                <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name" value="<?php echo $productName;?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="brand">Brand</label>
                                                <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" value="<?php echo $brand;?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="quality">Quality</label>
                                                <input type="text" class="form-control" id="quality" name="quality" placeholder="Quality" value="<?php echo $quality;?>"required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="<?php echo $quantity;?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $price;?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="retailPrice">Retail Price</label>
                                                <input type="text" class="form-control" id="retailPrice" name="retailPrice" placeholder="Retail Price" value="<?php echo $retailPrice;?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="total">Total</label>
                                            <input type="text" class="form-control" id="total" name="total" placeholder="Total" value="<?php echo $total;?>" required>
                                        </div>
                                        <button type="submit" name="update" class="btn btn-right btn-primary">Update Item</button>
                                        <?php if(isset($_POST['update'])) { echo "<font color='green'>Item Updated.</font><br/>";  } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once("footer.php"); ?>