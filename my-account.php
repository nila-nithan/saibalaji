<?php include("includes/header.php");?>
<?php
$customerID = $_SESSION['id'];
//orders
$sql = "SELECT * FROM `orders` WHERE `customer_id`= '$customerID' GROUP BY `order_id` ORDER BY `id` DESC ";
$bannerstmt = $conn->query($sql);
//address
$addresssql = "SELECT * FROM `customeraddress` WHERE `customerID` = '$customerID' ";
$addressstmt = $conn->query($addresssql);
$num_rows = $addressstmt->rowCount();
$addressrow = $addressstmt->fetch(PDO::FETCH_ASSOC);
?>
<!--header area end-->
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>My Account</h3>
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!-- my account start  -->
<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list" id="nav-tab">
                            <li><a href="#dashboard" data-toggle="tab" class="nav-link ">Dashboard</a></li>
                            <li> <a href="#orders" data-toggle="tab" class="nav-link active">Orders</a></li>
                            <li><a href="#downloads" data-toggle="tab" class="nav-link">Downloads</a></li>
                            <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li>
                            <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                            <li><a class="nav-link logout">logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade " id="dashboard">
                            <h3>Dashboard </h3>
                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                        </div>
                        <div class="tab-pane fade show active" id="orders">
                            <h3>Orders</h3>
                            <div class="table-responsive ">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $bannerstmt->fetch()) { ?>
                                            <tr>
                                                <td><?php echo $row['order_id'] ?></td>
                                                <td><?php echo $row['orderDate'] ?></td>
                                                <td><span class="success"><?php echo $row['payment_status'] ?></span></td>
                                                <td><?php echo $row['total'] ?></td>
                                                <td>
                                                    <form method="post" action="orderView.php">
                                                        <input type="hidden" name="order_id" value="<?php echo $row['order_id'] ?>">
                                                        <button type="submit" class="view">View</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php }; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="downloads">
                            <h3>Downloads</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Downloads</th>
                                            <th>Expires</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Shopnovilla - Free Real Estate PSD Template</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="danger">Expired</span></td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                        <tr>
                                            <td>Organic - ecommerce html template</td>
                                            <td>Sep 11, 2018</td>
                                            <td>Never</td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            <div class="coupon_area checkout_form">
                                <div class="col-lg-10 col-md-6 coupon_code right">
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-details">
                            <h3>Account details </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="#">
                                            <p>Already have an account? <a href="#">Log in instead!</a></p>
                                            <div class="input-radio">
                                                <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                            </div> <br>
                                            <label>First Name</label>
                                            <input type="text" name="first-name">
                                            <label>Last Name</label>
                                            <input type="text" name="last-name">
                                            <label>Email</label>
                                            <input type="text" name="email-name">
                                            <label>Password</label>
                                            <input type="password" name="user-password">
                                            <label>Birthdate</label>
                                            <input type="text" placeholder="MM/DD/YYYY" value="" name="birthday">
                                            <span class="example">
                                                (E.g.: 05/31/1970)
                                            </span>
                                            <br>
                                            <span class="custom_checkbox">
                                                <input type="checkbox" value="1" name="optin">
                                                <label>Receive offers from our partners</label>
                                            </span>
                                            <br>
                                            <span class="custom_checkbox">
                                                <input type="checkbox" value="1" name="newsletter">
                                                <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                            </span>
                                            <div class="save_button primary_btn default_button">
                                                <button type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account end   -->
<?php include("includes/footer.php"); ?>