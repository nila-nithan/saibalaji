<?php include("include/header.php"); ?>
<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Add category</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">category</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row" id="service_list">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="add_cat">
                        <form id="add_category">
                            <input type="hidden" name="add_category_form" value=1>
                            <div class="form-group">
                                <label for="">category name</label>
                                <input type="text" name="categoryName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">image</label>
                                <input type="file" name="image" id="uploadfile" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary center-block" id="cat_btn" type="submit" name="submit" value="submit">Submit</button>
                            </div>
                        </form>
                        <a href="category.php"><button class="btn btn-blue center-block"><i class="fa fa-backward" aria-hidden="true"></i>
                                <span>Go Back category page</span> </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("include/footer.php"); ?>