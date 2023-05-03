<?php include("include/header.php"); ?>
<?php
$order_id = $_GET['id'];
$customer_id = $_GET['customer_id'];
// $delivery_status = $_GET['delivery_status'];

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT * FROM `orders` JOIN `payment` ON `payment`.`order_id`=`orders`.`order_id` WHERE `orders`.`order_id`='$order_id' ";
$ordersstmts = $conn->query($sql);

$sql = "SELECT * FROM `orders` JOIN `payment` ON `payment`.`order_id`=`orders`.`order_id` WHERE `orders`.`order_id`='$order_id' ";
$ordersstmt = $conn->query($sql);
$rows = $ordersstmt->fetch(PDO::FETCH_ASSOC);
$grand_total = $rows['grand_total'];
$delivery_status = $rows['delivery_status'];
$order_id = $rows['order_id'];

$sql = "SELECT * FROM `customeraddress` JOIN `customer` ON `customer`.`id` =`customeraddress`.`customerID` WHERE `customerID`='$customer_id'";
$addressstmt = $conn->query($sql);
?>

<!-- begin MAIN PAGE CONTENT -->
<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>User Report</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a></li>
                        <li class="active">Service</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row" id="service_list">
            <div class="col-lg-12">
                <?php
                if ($delivery_status == 'processing') {
                    echo '<a href="processing.php"><button class="btn btn-blue"><i class="fa fa-backward" aria-hidden="true"></i>
                    <span>Go Back processing page</span> </button></a>';
                } elseif ($delivery_status == 'Shipping') {
                    echo '<a href="shipping.php"><button class="btn btn-blue"><i class="fa fa-backward" aria-hidden="true"></i>
                    <span>Go Back shipping page</span> </button></a>';
                } elseif ($delivery_status == 'delivered') {
                    echo '<a href="delivered.php"><button class="btn btn-blue"><i class="fa fa-backward" aria-hidden="true"></i>
                    <span>Go Back delivered page</span> </button></a>';
                } else {
                }
                ?>
                <div class="portlet portlet-default">
                    <div class="portlet-heading">
                        <div class="portlet-title" style="width: 100%; height: 40px;">
                            <h4 style="text-align: center;">User Details</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">customer Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Delivery Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $addressstmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['customerName']; ?></th>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['area']; ?></td>
                                        <td><?php echo $row['doorNo']; ?>,
                                            <?php echo $row['area']; ?>,
                                            <?php echo $row['town']; ?>,
                                            <?php echo $row['pincode']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="portlet portlet-default">
                    <div class="portlet-heading">
                        <div class="portlet-title" style="width: 100%; height: 40px;">
                            <h4 style="text-align: center;">Buying Details</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quentity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $ordersstmts->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['order_id']; ?></th>
                                        <td><?php echo $row['productName']; ?></td>
                                        <td><?php echo '₹' . $row['price']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        <td><?php echo '₹' . $row['total']; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th colspan="4" style="text-align: end;">Grand Toatal</th>
                                    <td><?php echo '₹' . $grand_total; ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <div style='display: flex;justify-content: space-between;'>
                            <?php
                            if ($delivery_status == 'processing') {
                                echo "<div class='deliverystatus' style:''><div><h4>Delivery status: <span style='color: #E49B0F;'>$delivery_status <i class='fa fa-spinner' aria-hidden='true'></i></span></h4>
                              <a class='btn btn-primary ShipingStatus' id='$order_id'>Shipping</a></div>";
                            } elseif ($delivery_status == 'Shipping') {
                                echo "<div><h4>Delivery status: <span style='color: #E49B0F;'>$delivery_status <i class='fa fa-truck' aria-hidden='true'></i></span></h4>
                        <a class='btn btn-green DeliveryStatus' id='$order_id'>Go To Delivery</a></div>";
                            } elseif ($delivery_status == 'delivered') {
                                echo "<div><h4>Delivery status: <span style='color: #E49B0F;'>$delivery_status <i class='fa fa-download' aria-hidden='true'></i></span></h4></div>";
                            }
                            ?>
                        </div>
                        <div>
                            <?php
                            if ($delivery_status == 'processing') {
                                echo "<h4>If Cancel this Deal: <span style='color: #E49B0F;'></h4>
                              <a style='margin-left' class='btn btn-danger CancelStatus' id='$order_id'>Cancel</a>";
                            } elseif ($delivery_status == 'Shipping') {
                                echo "<div style='margin-left: 85%;'><h4>If Cancel this Deal: <span style='color: #E49B0F;'></h4><a style='margin-left: ' class='btn btn-danger CancelStatus' id='$order_id'>Cancel</a></div></div>";
                            } elseif ($delivery_status == 'Delivered') {
                                echo "<h4>Delivery status: <span style='color: #E49B0F;'>$order_status <i class='fa fa-thumbs-up' aria-hidden='true'></i></span></h4>";
                            }
                            ?>
                        </div>


                    </div> <br>
                    <?php
                    if ($delivery_status == 'processing') {
                        echo `<a href="processing.php"><button class="btn btn-blue"><i class="fa fa-backward" aria-hidden="true"></i>
                    <span>Go Back order page</span> </button></a>`;
                    } elseif ($delivery_status == 'Shipping') {
                        echo `<a href="shipping.php"><button class="btn btn-blue"><i class="fa fa-backward" aria-hidden="true"></i>
                    <span>Go Back order page</span> </button></a>`;
                    } elseif ($delivery_status == 'Delivered') {
                        echo `<a href="delivered.php"><button class="btn btn-blue"><i class="fa fa-backward" aria-hidden="true"></i>
                    <span>Go Back order page</span> </button></a>`;
                    } else {
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page-content -->
<?php include("include/footer.php"); ?>