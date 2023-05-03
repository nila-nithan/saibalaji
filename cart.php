<?php include("includes/header.php");?>
<?php
$customerID = $_SESSION['id'];
//cart
$sql = "SELECT * FROM `cart` JOIN `products` ON `products`.`id` = `cart`.`product_id` WHERE `cart`.`customerID` = '$customerID' ";
$stmt = $conn->query($sql);

//cart total
$totalsql = "SELECT * FROM `cart` WHERE `customerID` = '$customerID' ";
$totalstmt = $conn->query($totalsql);
$totalrow = $totalstmt->fetchAll(PDO::FETCH_ASSOC);
$total = 0;
foreach ($totalrow as $row) {
    $total += $row['total'];
}

$addresssql = "SELECT * FROM `customeraddress` WHERE `customerID` = '$customerID' ";
$addressstmt = $conn->query($addresssql);
$num_rows = $addressstmt->rowCount();
$addressrow = $addressstmt->fetch(PDO::FETCH_ASSOC);

?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Cart</h3>
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area mt-70">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $stmt->fetch()) { ?>
                                        <tr>
                                            <td class="product_remove"><a href="#"><i class="fa fa-trash-o deleteCart" data-product-id="<?php echo $row['id'] ?>"></i></a></td>
                                            <td class="product_thumb"><a href="#"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a></td>
                                            <td class="product_name"><a href="#"><?php echo $row['productName'] ?></a></td>
                                            <td class="product-price">₹<?php echo $row['salesPrice'] ?></td>
                                            <td class="product_quantity"><label>Quantity</label>
                                                <form action="">
                                                    <input min="1" max="100" name="quantity" value="<?php echo $row['quantity'] ?>" type="number">
                                                    <br>
                                                    <button type="button " class="btn btn-light btn-outline-success update-to-cart" data-product-id="<?php echo $row['id'] ?>">update</button>
                                                </form>
                                            </td>
                                            <td class="product_total">₹<?php echo $row['total'] ?></td>
                                        </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area start-->
            <div class="coupon_area checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6 coupon_code right">
                        <?php
                        if ($num_rows > 0) {
                        ?>
                            <form action="#" id="updateAddress">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-lg-12 mb-20">
                                        <label>Name <span>*</span></label>
                                        <input type="text" value="<?php echo $_SESSION['customerName'] ?>">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Door Number <span>*</span></label>
                                        <input type="text" name="doorNo" value="<?php echo $addressrow['doorNo'] ?>" placeholder="example: 131" required>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Area address <span>*</span></label>
                                        <input name="area" value="<?php echo $addressrow['area'] ?>" placeholder="example: street name and area name" type="text">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Landmark <span>*</span></label>
                                        <input name="landmark" value="<?php echo $addressrow['landmark'] ?>" placeholder="example: Near metro station" type="text">
                                    </div>
                                    <div class="col-6 mb-20">
                                        <label>Town / City <span>*</span></label>
                                        <input name="town" value="<?php echo $addressrow['town'] ?>" type="text" placeholder="example: Egmore , chennai">
                                    </div>
                                    <div class="col-6 mb-20">
                                        <label>State<span>*</span></label>
                                        <input name="state" value="<?php echo $addressrow['state'] ?>" type="text">
                                    </div>
                                    <div class="col-6 mb-20">
                                        <label>Pin code<span>*</span></label>
                                        <input name="pincode" value="<?php echo $addressrow['pincode'] ?>" type="text">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Phone<span>*</span></label>
                                        <input name="phone" value="<?php echo $addressrow['phone'] ?>" type="text">
                                    </div>
                                </div>
                                <button class="button">UPDATE</button>
                            </form>
                        <?php } else { ?>
                            <form action="#" id="creteAddress">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-lg-12 mb-20">
                                        <label>Name <span>*</span></label>
                                        <input type="text" value="<?php echo $_SESSION['customerName'] ?>">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Door Number <span>*</span></label>
                                        <input type="text" name="doorNo" placeholder="example: 131" required>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Area address <span>*</span></label>
                                        <input name="area" placeholder="example: street name and area name" type="text">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Landmark <span>*</span></label>
                                        <input name="landmark" placeholder="example: Near metro station" type="text">
                                    </div>
                                    <div class="col-6 mb-20">
                                        <label>Town / City <span>*</span></label>
                                        <input name="town" type="text" placeholder="example: Egmore , chennai">
                                    </div>
                                    <div class="col-6 mb-20">
                                        <label>State<span>*</span></label>
                                        <input name="state" type="text">
                                    </div>
                                    <div class="col-6 mb-20">
                                        <label>Pin code<span>*</span></label>
                                        <input name="pincode" type="text">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Phone<span>*</span></label>
                                        <input name="phone" type="text">
                                    </div>
                                </div>
                                <button class="button">SUBMIT</button>
                            </form>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">₹<?php echo $total; ?></p>
                                </div>
                                
                                 
                                <div class="checkout_btn">
                                    <?php if ($num_rows > 0) { ?>
                                        <?php if($total > 0 ){?>
                                        <a href="checkout.php">Proceed to Checkout</a>
                                        <?php } else { ?>
                                            <a href="#method" data-bs-toggle="collapse" aria-controls="method">Proceed to Checkout</a>
                                        <div id="method" class="collapse one" data-parent="#accordion">
                                            <div class="card-body1">
                                                <p>Frist select some items</p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <a href="#method" data-bs-toggle="collapse" aria-controls="method">Proceed to Checkout</a>
                                        <div id="method" class="collapse one" data-parent="#accordion">
                                            <div class="card-body1">
                                                <p>Frist creat on delevery address</p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form>
    </div>
</div>
<!--shopping cart area end -->
<?php include("includes/footer.php"); ?>