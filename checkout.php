<?php include("includes/header.php");?>
<?php
$customerID = $_SESSION['id'];
//cart
$cartTotal = 0;
$sql = "SELECT * FROM `cart` JOIN `products` ON `products`.`id` = `cart`.`product_id` WHERE `cart`.`customerID` = '$customerID' ";
$stmt = $conn->query($sql);
// $row = $stmt->fetch(PDO::FETCH_ASSOC);
// $grandTotal += $row['price'];

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
                    <h3>Checkout</h3>
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->
<div class="Checkout_section mt-70">
    <div class="container">
        <div class="row">
        </div>
        <div class="checkout_form">
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
                    <div>
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        extract($row);
                                        $price = $salesPrice * $quantity;
                                        $cartTotal += $price;
                                    ?>

                                        <tr>
                                            <td> <?php echo $productName ?><strong> × <?php echo $quantity ?></strong></td>
                                            <td> ₹<?php echo $price ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td>₹<?php echo $cartTotal ?></td>
                                    </tr>
                                    <tr>
                                        <th>Store Charge</th>
                                        <td><strong>₹50.00</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td><strong>₹10.00</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order grand Total</th>
                                        <?php $grandTotal = $cartTotal + 60 ?>
                                        <?php if($cartTotal > 0){?>
                                        <td><strong>₹<?php echo $grandTotal ?></strong></td>
                                        <?}else{?>
                                            <td><strong></strong></td>
                                        <?php }?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <input id="payment" name="check_method" type="radio" data-target="createp_account" />
                                <a href="#method" data-bs-toggle="collapse" aria-controls="method">Create an account?</a>
                                <div id="method" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-default">
                                <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" />
                                <a href="#collapsedefult" data-bs-toggle="collapse" aria-controls="collapsedefult">PayPal <img src="assets/img/icon/papyel.png" alt=""></a>
                                <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="order_button">
                                <form id="payment">
                                    <input type="hidden" name="customer_id" value="<?php echo $_SESSION['id'] ?>">
                                    <input type="hidden" name="grand_total" value="<?php echo $grandTotal ?>">
                                    <input type="hidden" name="payment_status" value="success">
                                    <button type="submit" class="button">Proceed to Pay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout page section end-->
<?php include("includes/footer.php"); ?>