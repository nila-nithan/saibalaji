<?php include("include/header.php"); ?>
<?php 
$database = new Database();
$conn = $database->getConnection();
//total earning
$sql = "SELECT * FROM `payment` ";
$paymentstmt = $conn->query($sql);
//today earning
$date = date("Y-m-d");
$sql = "SELECT * FROM `payment` WHERE `date`= '$date' ";
$todaypaymentstmt = $conn->query($sql);
//total user
$sql = "SELECT * FROM `customer` ";
$customerstmt = $conn->query($sql);
$TotalUsers = $customerstmt->rowCount();
//today user
$sql = "SELECT * FROM `customer` WHERE `join_date`= '$date'";
$customerstmt = $conn->query($sql);
$TodayUsers = $customerstmt->rowCount();
//total products
$sql = "SELECT * FROM `products` ";
$productsstmt = $conn->query($sql);
$Totalproducts = $productsstmt->rowCount();
//total orders
$sql = "SELECT * FROM `orders` GROUP BY `order_id` ORDER BY `id` DESC ";
$orderssstmt = $conn->query($sql);
$Totalorders = $orderssstmt->rowCount();
//today orders
$sql = "SELECT * FROM `orders` WHERE `orderDate`= '$date' GROUP BY `order_id` ";
$todayorderssstmt = $conn->query($sql);
$Todayorders = $todayorderssstmt->rowCount();
 

?>
<div id="page-wrapper">
    <div class="page-content">
        <!-- begin PAGE TITLE AREA -->
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Dashboard
                        <small>Content Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                        <li class="pull-right">
                            <div id="reportrange" class="btn btn-green btn-square date-picker">
                                <i class="fa fa-calendar"></i>
                                <span class="date-range"></span> <i class="fa fa-caret-down"></i>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- begin DASHBOARD CIRCLE TILES -->
        <div class="row">
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="Payments.php">
                        <div class="circle-tile-heading dark-blue">
                            <i class="fa fa-money fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content dark-blue">
                        <div class="circle-tile-description text-faded">
                            Total Earnings
                        </div>
                        <div class="circle-tile-number text-faded">
                            <span id="sparklineA">
                                <?php $total = 0;
                                while($row = $paymentstmt->fetch(PDO::FETCH_ASSOC)){
                                    $total += $row['grand_total'];
                                } echo "₹" . $total;
                                ?>
                            </span>
                        </div>
                        <a href="Payments.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="Payments.php?id=1">
                        <div class="circle-tile-heading green">
                            <i class="fa fa-money fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content green">
                        <div class="circle-tile-description text-faded">
                            Today Earnings
                        </div>
                        <div class="circle-tile-number text-faded">
                            <span id="sparklineA">
                                <?php $total = 0;
                                while($row = $todaypaymentstmt->fetch(PDO::FETCH_ASSOC)){
                                    $total += $row['grand_total'];
                                } echo "₹" . $total;
                                ?>
                            </span>
                        </div>
                        <a href="Payments.php?id=1" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="user.php">
                        <div class="circle-tile-heading orange">
                            <i class="fa fa-users fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content orange">
                        <div class="circle-tile-description text-faded">
                            Total users
                        </div>
                        <div class="circle-tile-number text-faded">
                            <?php echo $TotalUsers ?>
                        </div>
                        <a href="user.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="user.php?id=1">
                        <div class="circle-tile-heading blue">
                            <i class="fa fa-user fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content blue">
                        <div class="circle-tile-description text-faded">
                            Today users
                        </div>
                        <div class="circle-tile-number text-faded">
                            <span id="sparklineB"><?php echo $TodayUsers ?></span>
                        </div>
                        <a href="user.php?id=1" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="product.php">
                        <div class="circle-tile-heading dark-blue">
                            <i class="fa fa-tags fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content dark-blue">
                        <div class="circle-tile-description text-faded">
                            Total products
                        </div>
                        <div class="circle-tile-number text-faded">
                            <span id="sparklineA"><?php echo $Totalproducts ?></span>
                        </div>
                        <a href="product.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="orders.php">
                        <div class="circle-tile-heading green">
                            <i class="fa fa-tasks fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content green">
                        <div class="circle-tile-description text-faded">
                            Total orders
                        </div>
                        <div class="circle-tile-number text-faded">
                        <span id="sparklineA"><?php echo $Totalorders ?></span>
                        </div>
                        <a href="orders.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="orders.php?id=1">
                        <div class="circle-tile-heading orange">
                            <i class="fa fa-bell fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content orange">
                        <div class="circle-tile-description text-faded">
                            Today orders
                        </div>
                        <div class="circle-tile-number text-faded">
                        <span id="sparklineA"><?php echo $Todayorders ?></span>
                        </div>
                        <a href="orders.php?id=1" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="orders_report.php?id=3">
                        <div class="circle-tile-heading purple">
                            <i class="fa fa-times-circle fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content purple">
                        <div class="circle-tile-description text-faded">
                            Total cancelled orders
                        </div>
                        <div class="circle-tile-number text-faded">
                            <span id="sparklineD"></span>
                        </div>
                        <a href="orders_report.php?id=3" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="circle-tile">
                    <a href="orders_report.php?id=4">
                        <div class="circle-tile-heading purple">
                            <i class="fa fa-times-circle fa-fw fa-3x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content purple">
                        <div class="circle-tile-description text-faded">
                            Today cancelled orders
                        </div>
                        <div class="circle-tile-number text-faded">
                            <span id="sparklineD"></span>
                        </div>
                        <a href="orders_report.php?id=4" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-content -->
</div>
<!-- end MAIN PAGE CONTENT -->
<?php include("include/footer.php"); ?>