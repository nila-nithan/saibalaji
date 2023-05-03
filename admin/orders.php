<?php include("include/header.php"); ?>
<?php
$database = new Database();
$conn = $database->getConnection();
 
$TodayDate = date("Y-m-d");
$id = $_GET['id'];

if ($id == '1') {
    $sql = "SELECT * FROM `orders` WHERE `orderDate`='$TodayDate' GROUP BY `order_id` ";
}else{
    $sql = "SELECT * FROM `orders` JOIN `payment` ON `payment`.`order_id`=`orders`.`order_id` GROUP BY `orders`.`order_id` ORDER BY `orders`.`id` DESC";
}
$stmt = $conn->query($sql);
?>
<!-- begin MAIN PAGE CONTENT -->
<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Order Report</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a></li>
                        <li class="active">Service</li>
                    </ol>
                </div>
            </div>
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
                                        <th style="width: 78px;">order_id</th>
                                        <th style="width: 78px;">customer ID</th>
                                        <th style="width: 193px;">grand total</th>
                                        <th style="width: 78px;">orderDate</th>
                                        <th style="width: 193px;">delivery_status</th>
                                        <!-- <th style="width: 193px;">view</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <th><?php echo $row['order_id']; ?></th>
                                            <th><?php echo $row['customer_id']; ?></th>
                                            <th><?php echo $row['grand_total']; ?></th>
                                            <th><?php echo $row['orderDate']; ?></th>
                                            <th><?php echo $row['delivery_status']; ?></th>
                                            <!-- <th> <a href="orders_details.php?id=<?php echo $row['order_id']; ?>&customer_id=<?php echo $row['customer_id']; ?>&delivery_status=<?php echo $row['delivery_status']; ?>" class='btn btn-primary' style='background:#16a085;color:white' id='<?php echo $row['order_unique_id']; ?>'>View</a> </th> -->
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
</div>
<!-- /.page-content -->
<?php include("include/footer.php"); ?>