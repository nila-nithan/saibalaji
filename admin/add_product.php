<?php include("include/header.php"); ?>
<?php
$database = new Database();
$conn = $database->getConnection();
$sql = "SELECT * FROM `category` ";
$stmt = $conn->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Add product</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">Product</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row" id="service_list">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="add_prdt">
                        <form id="add_product">
                            <div class="form-group">
                                <label for="">product name</label>
                                <input type="text" name="productName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">image2</label>
                                <input type="file" name="image2" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">image3</label>
                                <input type="file" name="image3" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">image4</label>
                                <input type="file" name="image4" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">image5</label>
                                <input type="file" name="image5" class="form-control" required>
                            </div>
                            <div class="select-box">
                                <label>category name</label>
                                <select name="categoryName" class="form-control" required>
                                    <option>Select category</option>
                                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <option value="<?php echo $row['categoryName']; ?>"><?php echo $row['categoryName']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">salesPrice</label>
                                <input type="text" name="salesPrice" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">actualPrice</label>
                                <input type="text" name="actualPrice" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="define KG" required>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" placeholder="somthing about product" required></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary submitBtn" id="cat_btn" type="submit" name="submit" value="submit">Submit</button>
                            </div>
                        </form>
                        <a href="product.php"><button class="btn btn-blue center-block"><i class="fa fa-backward" aria-hidden="true"></i><span>Go Back product page</span> </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './include/footer.php'; ?>
    <?php include './include/script.php'; ?>