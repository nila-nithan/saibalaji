<?php include("include/header.php");

$database = new Database();
$conn = $database->getConnection();
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `category` where `id`= '$id'";
$stmt = $conn->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php /*
if(isset($_GET['id'])) {
    $edit_id = $_GET['id'];
    echo '<pre>'.print_r($edit_id).'</pre>';exit;
    $sql = "SELECT * FROM `category` where `id`= '$edit_id'";
    $stmt = $conn->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // echo '<pre>'.print_r($row).'</pre>';
    exit;
} */
?>

<!-- begin MAIN PAGE CONTENT -->
<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>category</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end PAGE TITLE ROW -->

        <!-- end MAIN PAGE ROW -->
        <div class="row" id="">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="update_cats">
                        <form id="update_categorys">
                            <input type="hidden" name="add_category_form" value=1>
                            <div class="form-group">
                                <label for="">category name</label>
                                <input type="text" name="categoryName" class="form-control" value="<?php echo $row['categoryName'] ?>">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $row['id'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="">image</label>
                                <input type="hidden" name="oldimage" value="<?php echo $row['image'] ?>">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" id="cat_btn" type="submit" name="submit" value="submit">Update</button>
                            </div>
                        </form>
                        <a href="category.php"><button class="btn btn-blue center-block"><i class="fa fa-backward" aria-hidden="true"></i> <span>Go Back category page</span> </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './include/footer.php'; ?>
    <?php include './include/script.php'; ?>