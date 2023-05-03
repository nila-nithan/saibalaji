<?php include("include/header.php"); ?>
<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Add banner</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">banner</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row" id="service_list">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="add_bnr">
                        <form id="add_banner">
                            <div class="form-group">
                                <label for="">image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary submitBtn" id="cat_btn" type="submit" name="submit" value="submit">Submit</button>
                            </div>
                        </form>
                        <a href="banner.php"><button class="btn btn-blue center-block"><i class="fa fa-backward" aria-hidden="true"></i><span>Go Back Banner page</span> </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './include/footer.php'; ?>
    <?php include './include/script.php'; ?>