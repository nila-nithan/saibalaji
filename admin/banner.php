<?php include("include/header.php"); ?>
<?php
$database = new Database();
$conn = $database->getConnection();
$sql = "SELECT * FROM `banner` ";
$stmt = $conn->query($sql);
?>
<!-- begin MAIN PAGE CONTENT -->
<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Banner List</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">Banner</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row" id="product_listsss">
            <div class="col-lg-12">
                <div class="portlet portlet-default">
                    <div class="portlet-heading">
                        <div class="portlet-title" style="width: 100%; height: 40px;">
                            <h4>Banner List <a href="add_banner.php" id="add_new_service" class="btn btn-green btn-sm" style="float:right; margin-top:-7px;"><i class="fa fa-plus"></i> Add Banner</a></h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                <thead>
                                    <tr>
                                        <th>Banner image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td><img style='width:400px;' src='../upload/banner/<?php echo $row["banner"]; ?>'></td>
                                            <td><i class='delete_banner fa fa-trash-o btn btn-danger' data-id=<?php echo $row['id']; ?>></i>
                                            </td>
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
    <?php include './include/script.php'; ?>