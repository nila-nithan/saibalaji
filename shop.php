<?php include("includes/header.php");?>

<!--breadcrumbs area start-->
<!-- <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Shop</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div> -->
<!--breadcrumbs area end-->

<!--shop  area start-->
<div class="shop_area shop_fullwidth mt-70 mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">

                        <button data-role="grid_3" type="button" class=" btn-grid-3" data-toggle="tooltip" title="3"></button>

                        <button data-role="grid_4" type="button" class="active btn-grid-4" data-toggle="tooltip" title="4"></button>

                        <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
                    </div>
                    <div class=" niceselect_option">
                        <form class="select_option" action="#">
                            <select name="orderby" id="short">

                                <option selected value="1">Sort by average rating</option>
                                <option value="2">Sort by popularity</option>
                                <option value="3">Sort by newness</option>
                                <option value="4">Sort by price: low to high</option>
                                <option value="5">Sort by price: high to low</option>
                                <option value="6">Product Name: Z</option>
                            </select>
                        </form>
                    </div>
                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper">
                    <?php
                    if(isset($_GET['name'])){
                        $categoryName = $_GET['name'];
                        $sql = "SELECT * FROM `products` where `categoryName`='$categoryName' ";
                    }else if(isset($_GET['productName'])){
                        $productName = $_GET['productName'];
                        $categoryName = $_GET['category'];
                        // $sql = "SELECT * FROM `products` WHERE `categoryName`='$categoryName' AND LIKE `productName`= '$productName'";
                        $sql = "SELECT * FROM products  WHERE categoryName LIKE '%$categoryName%' AND productName LIKE '%$productName%'";
                    }else{
                        $sql = "SELECT * FROM `products` ";
                    }
                    $stmt = $conn->query($sql);
                    while ($row = $stmt->fetch()) {
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                    <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                        <span class="label_new">New</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="add_to_cart">
                                                <a class="add-to-cart" data-product-id="<?php echo $row['id'] ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                            </li>
                                            <li class="quick_button"><a href="#" data-tippy="quick view" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="#modal_box"> <span class="lnr lnr-magnifier"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content grid_content">
                                    <h4 class="product_name"><a href="product-details.html"><?php echo $row['productName'] ?></a></h4>
                                    <p><a href="#"><?php echo $row['categoryName'] ?></a></p>
                                    <div class="price_box">
                                        <span class="current_price">₹<?php echo $row['salesPrice'] ?></span>
                                        <span class="old_price">₹<?php echo $row['actualPrice'] ?></span>
                                    </div>
                                </div>
                                <div class="product_content list_content">
                                    <h4 class="product_name"><a href="product-details.html">Aliquam Consequat</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box">
                                        <span class="current_price">₹<?php echo $row['salesPrice'] ?></span>
                                        <span class="old_price">₹<?php echo $row['actualPrice'] ?></span>
                                    </div>
                                    <div class="product_desc">
                                        <p><?php echo $row['description'] ?></p>
                                    </div>
                                    <div class="action_links list_action_right">
                                        <ul>
                                            <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to Cart</a></li>
                                            <li class="quick_button"><a href="#" data-tippy="quick view" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="#modal_box"> <span class="lnr lnr-magnifier"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>
                </div>

                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        <ul>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </div>
                </div>
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
<!--shop  area end-->
<?php include("includes/footer.php"); ?>