<?php include("include/header.php");

$database = new Database();
$conn = $database->getConnection();
$sql = "SELECT * FROM `category` ";
$stmt = $conn->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
        <!-- begin MAIN PAGE ROW -->
        <div class="row" id="category_list">
            <div class="col-lg-12">
                <div class="portlet portlet-default">
                    <div class="portlet-heading">
                        <div class="portlet-title" style="width: 100%; height: 40px;">
                            <h4>Category List <a href="add_category.php" id="add_new_service" class="btn btn-green btn-sm" style="float:right; margin-top:-7px;"><i class="fa fa-plus"></i> Add category</a></h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td><?php echo $row['categoryName']; ?></td>
                                            <td><img style='width:40px;' src='../upload/category/<?php echo $row["image"]; ?>'></td>
                                            <td style='display:flex;justify-content: space-around;padding: 16px;' ;>
                                                <a href="edit_category.php?id=<?php echo $row["id"]; ?>"><i id=<?php echo $row["id"]; ?> class='edit_category fa fa-edit btn btn-primary' data-id=<?php echo $row["id"]; ?>></i></a>
                                                <i class='delete-category fa fa-trash-o btn btn-danger' id=<?php echo $row['id']; ?>></i>
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
        <!-- end MAIN PAGE ROW -->
        <!-- <div class="row" id="edit_category_page" style="display: none;">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="add_cats">
                        <form id="add_categorys">
                            <input type="hidden" name="add_category_form" value=1>
                            <div class="form-group">
                                <label for="">category name</label>
                                <input type="text" id="category_name" name="category_name" class="form-control" required>
                                <input type="hidden" id="category_id" name="category_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">category icon</label>
                                <input type="text" id="category_icon" name="category_icon" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">image</label>
                                <input type="hidden" name="old_image" id="cat_img">
                                <p id="cat_image"></p>
                                <input type="file" name="image" id="uploadfile" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" id="cat_btn" type="submit" name="submit" value="submit">Update</button>
                            </div>
                        </form>
                        <a href="category.php"><button class="btn btn-blue center-block"><i class="fa fa-backward" aria-hidden="true"></i>
                                <span>Go Back category page</span> </button></a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <?php include './include/footer.php'; ?>
    <?php include './include/script.php'; ?>
