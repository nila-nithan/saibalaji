<?php include("include/header.php"); ?>

<?php
$database = new Database();
$conn = $database->getConnection();

$TodayDate = date("Y-m-d");
$report = $_GET['id'];

if (isset($_POST['Fromdate'])) {
    $from_date = $_POST['Fromdate'];
    $to_date = $_POST['Todate'];
    $sql = "SELECT * FROM `payment` JOIN `customer` ON `customer`.`id`=`payment`.`customer_id` WHERE `date` BETWEEN '$from_date' AND '$to_date';";
} elseif ($report == '1') {
    $sql = "SELECT * FROM `payment` JOIN `customer` ON `customer`.`id`=`payment`.`customer_id` WHERE `date`='$TodayDate' ";
} else {
    $sql = "SELECT * FROM `payment` JOIN `customer` ON `customer`.`id`=`payment`.`customer_id` ORDER BY `payment`.`id` DESC";
}

// $sql = "SELECT * FROM `payment` JOIN `customer` ON `customer`.`id`=`payment`.`customer_id` ORDER BY `payment`.`id` DESC";

$stmt = $conn->query($sql);
?>

<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>PAYMENTS</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">Service</li>
                    </ol>
                </div>
            </div>
        </div>
   
        <div class="shortlist">
            <form method="POST" action="" id="searchDate">
                <label for="date">From Date:</label>
                <input type="date" id="date1" name="Fromdate" value="">
                <label for="date">To Date:</label>
                <input type="date" id="date2" name="Todate" value="">
                <button type="submit" class="green dateFilter">
                    <span style="border-radius: 50px;font-weight: bolder;border-radius: 50px;" class="btn">go <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                </button>
            </form>
            <!-- <button type="submit" id="searchDates" class="btn " style="border-radius: 50px;font-weight: bolder;border-radius: 50px;">View All Date</button> -->
        </div>
        <div class="row" id="service_list">
            <div class="col-lg-12">
                <div class="portlet portlet-default">
                    <div class="portlet-heading">
                        <div class="portlet-title" style="width: 100%; height: 40px;">
                            <h4>Service List</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                        <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                <thead>
                                    <tr>
                                        <th style="width: 78px;">customer ID</th>
                                        <th style="width: 78px;">customer Name</th>
                                        <th style="width: 78px;">Order ID</th>
                                        <th style="width: 193px;">payment_id</th>
                                        <th style="width: 78px;">payment_status</th>
                                        <th style="width: 193px;">Total Value</th>
                                        <th style="width: 193px;">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <th><?php echo $row['customer_id']; ?></th>
                                            <th><?php echo $row['customerName']; ?></th>
                                            <th><?php echo $row['order_id']; ?></th>
                                            <th><?php echo $row['payment_id']; ?></th>
                                            <th><?php echo $row['payment_status']; ?></th>
                                            <th><?php echo $row['grand_total']; ?></th>
                                            <th><?php echo $row['date']; ?></th>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './include/footer.php'; ?>