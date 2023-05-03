<?php include("include/header.php"); ?>
<?php
// $database = new Database();
// $conn = $database->getConnection();
// $sql = "SELECT * FROM `customer`";
// $stmt = $conn->query($sql);
?>
<?php  
date_default_timezone_set("Asia/Kolkata");
$TodayDate = date("Y-m-d");
$id = $_GET['id'];
$database = new Database();
$conn = $database->getConnection();
if ($id == '1') {
    $sql = "SELECT * FROM `customer` where `join_date`='$TodayDate'";
} else {
    $sql = "SELECT * FROM `customer` ORDER BY `id` DESC";
}
$stmt = $conn->query($sql);
 
?>

<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1><?php
                        if ($id == '1') {
                            echo 'TODAY USERS';
                        } else {
                            echo 'TOTAL USERS';
                        }
                        ?></h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
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
                                        <th style="width: 78px;">User Name</th>
                                        <th style="width: 78px;">Email</th>
                                        <th style="width: 78px;">Mobile</th>
                                        <th style="width: 78px;">Join Date</th>
                                        <!-- <th style="width: 78px;">Address</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <th><?php echo $row['customerName']; ?></th>
                                            <th><?php echo $row['email']; ?></th>
                                            <th><?php echo $row['phone']; ?></th>
                                            <th><?php echo $row['join_date']; ?></th>
                                            <!-- <td><?php echo $row['area']; ?>,
                                                <?php echo $row['town']; ?>,
                                                <?php echo $row['state']; ?>,
                                                <?php echo $row['pincode']; ?></td> -->
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
    <?php include("include/footer.php"); ?>