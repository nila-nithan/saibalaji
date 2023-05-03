<?php include("include/header.php"); ?>
<?php
$database = new Database();
$conn = $database->getConnection();
$sql = "SELECT * FROM `products` ";
$stmt = $conn->query($sql);
?>
<!-- begin MAIN PAGE CONTENT -->
<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Product List</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">product</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row" id="product_listsss">
            <div class="col-lg-12">
                <div class="portlet portlet-default">
                    <div class="portlet-heading">
                        <div class="portlet-title" style="width: 100%; height: 40px;">
                            <h4>product List <a href="add_product.php" id="add_new_service" class="btn btn-green btn-sm" style="float:right; margin-top:-7px;"><i class="fa fa-plus"></i> Add product</a></h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                <thead>
                                    <tr>
                                        <th>Product image</th>
                                        <th>Product name</th>
                                        <th>Category</th>
                                        <th>price</th>
                                        <th>quantity</th>
                                        <th>Action</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td><img style='width:40px;' src='../upload/product/<?php echo $row["image"]; ?>'></td>
                                            <td><?php echo $row['productName']; ?></td>
                                            <td><?php echo $row['categoryName']; ?></td>
                                            <td><?php echo $row['salesPrice']; ?></td>
                                            <td>
                                            <?php if($row['stock_qty'] > 0){
                                                echo $row['stock_qty'];
                                            }else{
                                                echo"<span style='color:red'>out of stock</span>";
                                            } ?>
                                            </td>
                                            <td><a href="edit_product.php?id=<?php echo $row["id"]; ?>"><i id=<?php echo $row["id"]; ?> class='fa fa-edit btn btn-primary' data-id=<?php echo $row["id"]; ?>></i></a>
                                                <i class='delete_category fa fa-trash-o btn btn-danger' data-id=<?php echo $row['id']; ?>></i>
                                            </td>
                                            <td><a href="product_details.php?id=<?php echo $row['id']; ?>" name='view_btn' class='btn btn-primary view_button' style='background:#16a085;color:white' id=<?php echo $row['id']; ?>>View</a></td>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Details
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <?php include './include/footer.php'; ?>