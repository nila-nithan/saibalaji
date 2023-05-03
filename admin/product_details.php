<?php include("include/header.php"); ?>
<?php
$database = new Database();
$conn = $database->getConnection();
echo $id = $_GET['id'];
$sql = "SELECT * FROM `products` WHERE `id`='$id'";
$stmt = $conn->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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

        <div class="row" id="edit_product_page">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body" name="product_id" id="">
                        <form id="">
                            <input type="hidden" name="product_id" class="form-control" id="p_id" required>
                            <input type="hidden" name="category_id" class="form-control" id="cat_id" required>
                            <div class="form-group">
                                <label for="">product name</label>
                                <input type="text" name="product_name" class="form-control" value="<?php echo $row["productName"]; ?>" required>
                            </div>
                            <div class="form-img" style="display:flex;justify-content:space-between;">
                                <div class="form-group" >
                                    <label for="">image</label>
                                    <input type="hidden" name="image_name1" id="p_img1">
                                    <p><img style="width:50%" src='../upload/product/<?php echo $row["image"]; ?>'></p>
                              
                                </div>
                                <div class="form-group">
                                    <label for="">image2</label>
                                    <input type="hidden" name="image_name2" id="p_img2">
                                    <p><img style="width:50%" src='../upload/product/<?php echo $row["image2"]; ?>'></p>
                                </div>
                                <div class="form-group">
                                    <label for="">image3</label>
                                    <input style="width:20px;height:auto;" type="hidden" name="image_name3" id="p_img3">
                                    <p><img style="width:50%" src='../upload/product/<?php echo $row["image3"]; ?>'></p>
                                </div>
                                <div class="form-group">
                                    <label for="">image4</label>
                                    <input type="hidden" name="image_name4" id="p_img4">
                                    <p><img style="width:50%" src='../upload/product/<?php echo $row["image4"]; ?>'></p>
                                </div>
                                <div class="form-group">
                                    <label for="">image5</label>
                                    <input type="hidden" name="image_name5" id="p_img5">
                                    <p><img style="width:50%" src='../upload/product/<?php echo $row["image5"]; ?>'></p>
                                </div>
                            </div>
                            <div class="select-box">
                                <label>category name</label>
                                <input type="text" value="<?php echo $row["categoryName"]; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">salesPrice</label>
                                <input type="text" name="salesPrice" value="<?php echo $row["salesPrice"]; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">actualPrice</label>
                                <input type="text" name="actualPrice" value="<?php echo $row["actualPrice"]; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">quantity</label>
                                <input type="text" name="quantity" value="<?php echo $row["stock_qty"]; ?> kg" class="form-control" required>
                            </div>
                            <div class="form-group">
                            </div>
                        </form>
                        <a href="product.php" id="edit_product_page"><button class="btn btn-blue center-block"><i class="fa fa-backward" aria-hidden="true"></i> <span>Go Back product page</span> </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <?php include './include/footer.php'; ?>
    <?php include './include/script.php'; ?>