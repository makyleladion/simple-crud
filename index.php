<?php include_once("header.php"); ?>

        <div class="page-container">
            <?php include_once("headernav.php"); ?>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-6"></div>
                        <div class="masonry-item w-100">
                            <div class="row gap-20">
                                <div class="col-md-4">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Total Products</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">
                                                    <?php 
                                                    if (mysqli_connect_errno()) 
                                                    { 
                                                        echo "Database connection failed."; 
                                                    } 

                                                    $query = "SELECT id FROM storage"; 

                                                    $result = mysqli_query($mysqli, $query);

                                                    if ($result) 
                                                    { 
                                                        // it return number of rows in the table. 
                                                        $row = mysqli_num_rows($result); 
                                                          
                                                           if ($row) 
                                                              { 
                                                                 echo $row;
                                                              } 
                                                        // close the result. 
                                                        mysqli_free_result($result); 
                                                    } 
                                                    ?>

                                                </span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Total Delivery </h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">0</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Revenue</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">0</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        <div class="masonry-item col-md-12">
                            <div class="bgc-white bd bdrs-3 p-20">
                                    <h4 class="c-grey-900 mB-20">Product Details</h4>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Entry #</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Quality</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Retail Price</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Total Price</th>                                                
                                                <th scope="col">Date</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                                                //selecting data associated with this particular id
                                                if (mysqli_connect_errno()) 
                                                    { 
                                                        echo "Database connection failed."; 
                                                    } 

                                                $query = "SELECT * FROM storage ORDER BY id DESC"; 
                                                $result = mysqli_query($mysqli, $query);

                                                while($res = mysqli_fetch_array($result)) {  
                                                ?>
                                                     <tr>
                                                        <th scope="row"><?php echo $res['id']; ?></th>
                                                        <td><?php echo $res['product_name']; ?></td>
                                                        <td><?php echo $res['brand']; ?></td>
                                                        <td><?php echo $res['quality']; ?></td>
                                                        <td><?php echo $res['quantity']; ?></td>
                                                        <td><?php echo $res['price']; ?></td>
                                                        <td><?php echo $res['retail_price']; ?></td>
                                                        <td><?php echo $res['total_price']; ?></td>
                                                        <td><?php echo $res['date_added']; ?></td>
                                                        <td><?php echo "<a href=\"edititem.php?id=$res[id]\">Edit</a> | <a href=\"deleteitem.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>" ?></td>
                                                    </tr>
                                                <?php  
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </main>

<?php include_once("footer.php"); ?>