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
                    <div class="panel-body">
                        <form id="updateProduct">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $row["id"]; ?>" required>
                            <div class="form-group">
                                <label>product name</label>
                                <input type="text" name="productName" class="form-control" value="<?php echo $row["productName"]; ?>">
                            </div>
                            <div class="form-img" style="display:flex;justify-content:space-between;">
                                <div class="form-group">
                                    <h4>image</h4>
                                    <input type="hidden" name="oldimage" value="<?php echo $row["image"]; ?>">
                                    <img style='width:180px;' src='../upload/product/<?php echo $row["image"]; ?>'>
                                    <p>if change the picture</p>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <h4>image2</h4>
                                    <input type="hidden" name="oldimage2" value="<?php echo $row["image2"]; ?>">
                                    <img style='width:180px;' src='../upload/product/<?php echo $row["image2"]; ?>'>
                                    <p>if change the picture</p>
                                    <input type="file" name="image2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <h4>image3</h4>
                                    <input type="hidden" name="oldimage3" value="<?php echo $row["image3"]; ?>">
                                    <img style='width:180px;' src='../upload/product/<?php echo $row["image3"]; ?>'>
                                    <p>if change the picture</p>
                                    <input type="file" name="image3" class="form-control">
                                </div>
                                <div class="form-group">
                                    <h4>image4</h4>
                                    <input type="hidden" name="oldimage4" value="<?php echo $row["image4"]; ?>">
                                    <img style='width:180px;' src='../upload/product/<?php echo $row["image4"]; ?>'>
                                    <p>if change the picture</p>
                                    <input type="file" name="image4" class="form-control">
                                </div>
                                <div class="form-group">
                                    <h4>image5</h4>
                                    <input type="hidden" name="oldimage5" value="<?php echo $row["image5"]; ?>">
                                    <img style='width:180px;' src='../upload/product/<?php echo $row["image5"]; ?>'>
                                    <p>if change the picture</p>
                                    <input type="file" name="image5" class="form-control">
                                </div>
                            </div>
                            <div class="select-box">
                                <label>category name</label>
                                <input type="text" name="categoryName" value="<?php echo $row["categoryName"]; ?>" class="form-control">
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
                                <button class="btn btn-primary" type="submit" name="submit" value="submit">Update</button>
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