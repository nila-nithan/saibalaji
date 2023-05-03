<?php include("includes/header.php"); ?>
<?php
//banner
$sql = "SELECT * FROM `banner` ";
$bannerstmt = $conn->query($sql);
?>
<!--header area end-->
<!--slider area start-->
<section class="slider_sxection">
    <div class="slider_area owl-carousel">
        <?php while ($row = $bannerstmt->fetch()) { ?>
            <div class="single_slider d-flex align-items-center" data-bgimg="upload/banner/<?php echo $row['banner'] ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Fish Big Sale</h1>
                                <h2>Fresh Farm & Sea Products</h2>
                                <p> 10% certifled-organic mix of fruit and veggies. Perfect for weekly cooking and snacking! </p> <a href="shop.php">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
</section>
<!--slider area end-->
<!--shipping area start-->
<div class="shipping_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single_shipping">
                    <div class="shipping_icone"> <img src="assets/img/about/shipping1.jpg" alt=""> </div>
                    <div class="shipping_content">
                        <h3>Free Shipping</h3>
                        <p>Free shipping on all US order or order above ₹1000</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single_shipping col_2">
                    <div class="shipping_icone"> <img src="assets/img/about/shipping2.jpg" alt=""> </div>
                    <div class="shipping_content">
                        <h3>Support 24/7</h3>
                        <p>Contact us 24 hours a day, 7 days a week</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single_shipping col_3">
                    <div class="shipping_icone"> <img src="assets/img/about/shipping3.jpg" alt=""> </div>
                    <div class="shipping_content">
                        <h3>Assured to Fresh</h3>
                        <p>We select verified seller and products</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single_shipping col_4">
                    <div class="shipping_icone"> <img src="assets/img/about/shipping4.jpg" alt=""> </div>
                    <div class="shipping_content">
                        <h3>100% Payment Secure</h3>
                        <p>We ensure secure payment with PEV</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--shipping area end-->
<!--product area start-->
<div class="product_area  mb-64">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <p>Recently added our store</p>
                        <h2>Trending Products</h2>
                    </div>
                    <div class="product_tab_btn">
                        <ul class="nav" role="tablist" id="nav-tab">
                            <li> <a class="active" data-toggle="tab" href="#fish" role="tab" aria-controls="plant1" aria-selected="true">
                                    FISH
                                </a> </li>
                            <li> <a data-toggle="tab" href="#crab" role="tab" aria-controls="plant2" aria-selected="false">
                                    CRAB
                                </a> </li>
                            <li> <a data-toggle="tab" href="#prawn" role="tab" aria-controls="plant3" aria-selected="false">
                                    PRAWN
                                </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="product_container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="fish" role="tabpanel">
                            <div class="product_carousel product_column5 owl-carousel">
                                <?php
                                $sql = "SELECT * FROM `products` WHERE `categoryName` LIKE '%fish%' ";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                                    <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                                    <div class="label_product"> <span class="label_sale">Sale</span> <span class="label_new">New</span> </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart">
                                                                <?php if (isset($_SESSION['id'])) {
                                                                    echo '<a class="add-to-cart" data-product-id="' . $row["id"] . '" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                                } else {
                                                                    echo '<a href="login.php" data-tippy="FRIST LOGIN" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                                } ?>
                                                            </li>
                                                            <li class="quick_button">
                                                                <a href="product-details.php?id=<?php echo $row['id'] ?>" data-tippy="Product View" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-magnifier"></span></a>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.php"><?php echo $row['productName'] ?></a></h4>
                                                    <p><a href="#">Fish</a></p>
                                                    <div class="price_box"> <span class="current_price">₹<?php echo $row['salesPrice'] ?></span> <span class="old_price">₹<?php echo $row['actualPrice'] ?></span> </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <!-- <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                                    <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                                    <div class="label_product"> <span class="label_sale">Sale</span> </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart">
                                                                <a class="add-to-cart" data-product-id="<?php echo $row['id'] ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                                            </li>
                                                            <li class="quick_button">
                                                                <a href="#" data-tippy="quick view" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="#modal_box"> <span class="lnr lnr-magnifier"></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.php"><?php echo $row['productName'] ?></a></h4>
                                                    <p><a href="#">Fish</a></p>
                                                    <div class="price_box"> <span class="current_price">₹<?php echo $row['salesPrice'] ?></span> <span class="old_price">₹<?php echo $row['actualPrice'] ?></span> </div>
                                                </figcaption>
                                            </figure>
                                        </article> -->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="crab" role="tabpanel">
                            <div class="product_carousel product_column5 owl-carousel">
                                <?php
                                $sql = "SELECT * FROM `products` WHERE `categoryName` LIKE '%crab%' ";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                                    <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                                    <div class="label_product"> <span class="label_sale">Sale</span> <span class="label_new">New</span> </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart">
                                                                <?php if (isset($_SESSION['id'])) {
                                                                    echo '<a class="add-to-cart" data-product-id="' . $row["id"] . '" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                                } else {
                                                                    echo '<a href="login.php" data-tippy="FRIST LOGIN" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                                } ?>
                                                            </li>
                                                            <li class="quick_button">
                                                                <a href="product-details.php?id=<?php echo $row['id'] ?>"> <span class="lnr lnr-magnifier"></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.php"><?php echo $row['productName'] ?></a></h4>
                                                    <p><a href="#">Fish</a></p>
                                                    <div class="price_box"> <span class="current_price">₹<?php echo $row['salesPrice'] ?></span> <span class="old_price">₹<?php echo $row['actualPrice'] ?></span> </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <!-- <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                                    <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                                    <div class="label_product"> <span class="label_sale">Sale</span> </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart">
                                                                <a class="add-to-cart" data-product-id="<?php echo $row['id'] ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                                            </li>
                                                            <li class="quick_button">
                                                                <a href="#" data-tippy="quick view" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="#modal_box"> <span class="lnr lnr-magnifier"></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.php"><?php echo $row['productName'] ?></a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box"> <span class="current_price">₹<?php echo $row['salesPrice'] ?></span> <span class="old_price">₹<?php echo $row['actualPrice'] ?></span> </div>
                                                </figcaption>
                                            </figure>
                                        </article> -->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="prawn" role="tabpanel">
                            <div class="product_carousel product_column5 owl-carousel">
                                <?php
                                $sql = "SELECT * FROM `products` WHERE `categoryName` LIKE '%Prawns%' ";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                                    <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                                    <div class="label_product"> <span class="label_sale">Sale</span> <span class="label_new">New</span> </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart">
                                                                <?php if (isset($_SESSION['id'])) {
                                                                    echo '<a class="add-to-cart" data-product-id="' . $row["id"] . '" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                                } else {
                                                                    echo '<a href="login.php" data-tippy="FRIST LOGIN" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                                } ?>
                                                            </li>
                                                            <li class="quick_button">
                                                                <a href="product-details.php?id=<?php echo $row['id'] ?>"> <span class="lnr lnr-magnifier"></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.php"><?php echo $row['productName'] ?></a></h4>
                                                    <p><a href="#">Fish</a></p>
                                                    <div class="price_box"> <span class="current_price">₹<?php echo $row['salesPrice'] ?></span> <span class="old_price">₹<?php echo $row['actualPrice'] ?></span> </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <!-- <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                                    <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                                    <div class="label_product"> <span class="label_sale">Sale</span> </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart">
                                                                <a class="add-to-cart" data-product-id="<?php echo $row['id'] ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.php"><?php echo $row['productName'] ?></a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box"> <span class="current_price">₹<?php echo $row['salesPrice'] ?></span> <span class="old_price">₹<?php echo $row['actualPrice'] ?></span> </div>
                                                </figcaption>
                                            </figure>
                                        </article> -->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product area end-->
<!--banner area start-->
<div class="banner_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="shop.php"><img src="assets/img/bg/banner1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="shop.php"><img src="assets/img/bg/banner2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner area end-->
<!--product area start-->
<div class="product_area product_deals mb-65">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <p>Recently added our store </p>
                    <h2>Deals Of The Weeks</h2>
                </div>
            </div>
        </div>
        <div class="product_container">
            <div class="row">
                <div class="col-12">
                    <div class="product_carousel product_column5 owl-carousel">
                        <?php
                        $sql = "SELECT * FROM `products` ";
                        $stmt = $conn->query($sql);
                        while ($row = $stmt->fetch()) {
                        ?>
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                        <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                        <div class="label_product"> <span class="label_sale">Sale</span> <span class="label_new">New</span> </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart">
                                                    <?php if (isset($_SESSION['id'])) {
                                                        echo '<a class="add-to-cart" data-product-id="' . $row["id"] . '" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                    } else {
                                                        echo '<a href="login.php" data-tippy="FRIST LOGIN" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                    } ?>
                                                </li>
                                                <li class="quick_button">
                                                    <a href="product-details.php?id=<?php echo $row['id'] ?>"> <span class="lnr lnr-magnifier"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.php"><?php echo $row['productName'] ?></a></h4>
                                        <p><a href="#">Fruits</a></p>
                                        <div class="price_box"> <span class="current_price">₹<?php echo $row['salesPrice'] ?></span> <span class="old_price">₹<?php echo $row['actualPrice'] ?></span> </div>
                                    </figcaption>
                                </figure>
                            </article>
                        <?php }; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product area end-->
<!--banner fullwidth area satrt-->
<div class="banner_fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_full_content">
                    <p>Black Fridays !</p>
                    <h2>Sale 50% OFf <span>all vegetable products</span></h2> <a href="shop.php">discover now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner fullwidth area end-->
<!--product banner area satrt-->
<div class="product_banner_area mb-65">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <p>Recently added our store </p>
                    <h2>Best Sellers</h2>
                </div>
            </div>
        </div>
        <div class="product_banner_container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="banner_thumb">
                        <a href="shop.php"><img src="assets/img/bg/banner4.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="small_product_area product_carousel  product_column2 owl-carousel">
                        <?php
                        $sql = "SELECT * FROM `products` limit 3";
                        $stmt = $conn->query($sql);
                        while ($row = $stmt->fetch()) { ?>
                            <div class="product_items">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                            <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <h4 class="product_name"><a href="product-details.php">Donec Non Est</a></h4>
                                            <p><a href="#"><?php echo $row['productName'] ?></a></p>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="add_to_cart">
                                                        <?php if (isset($_SESSION['id'])) {
                                                            echo '<a class="add-to-cart" data-product-id="' . $row["id"] . '" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                        } else {
                                                            echo '<a href="login.php" data-tippy="FRIST LOGIN" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                        } ?>
                                                    </li>
                                                    <li class="quick_button">
                                                        <a href="product-details.php?id=<?php echo $row['id'] ?>"> <span class="lnr lnr-magnifier"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="price_box"> <span class="current_price">$<?php echo $row['salesPrice'] ?></span> <span class="old_price">$<?php echo $row['actualPrice'] ?></span> </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                            <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <h4 class="product_name"><a href="product-details.php">Donec Non Est</a></h4>
                                            <p><a href="#"><?php echo $row['productName'] ?></a></p>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="add_to_cart">
                                                        <a class="add-to-cart" data-product-id="<?php echo $row['id'] ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>
                                                    </li>
                                                    <li class="quick_button">
                                                        <a href="product-details.php?id=<?php echo $row['id'] ?>"> <span class="lnr lnr-magnifier"></span></a>
                                                    </li>


                                                </ul>
                                            </div>
                                            <div class="price_box"> <span class="current_price">$<?php echo $row['salesPrice'] ?></span> <span class="old_price">$<?php echo $row['actualPrice'] ?></span> </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.php"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                            <a class="secondary_img" href="product-details.php"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <h4 class="product_name"><a href="product-details.php">Donec Non Est</a></h4>
                                            <p><a href="#"><?php echo $row['productName'] ?></a></p>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="add_to_cart">
                                                        <?php if (isset($_SESSION['id'])) {
                                                            echo '<a class="add-to-cart" data-product-id="' . $row["id"] . '" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                        } else {
                                                            echo '<a href="login.php" data-tippy="FRIST LOGIN" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                        } ?>
                                                    </li>
                                                    <li class="quick_button">
                                                        <a href="product-details.php?id=<?php echo $row['id'] ?>"> <span class="lnr lnr-magnifier"></span></a>
                                                    </li>


                                                </ul>
                                            </div>
                                            <div class="price_box"> <span class="current_price">$<?php echo $row['salesPrice'] ?></span> <span class="old_price">$<?php echo $row['actualPrice'] ?></span> </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        <?php }; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product banner area end-->
<!--product area start-->
<div class="product_area mb-65">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <p>Recently added our store </p>
                    <h2>Mostview Products</h2>
                </div>
            </div>
        </div>
        <div class="product_container">
            <div class="row">
                <div class="col-12">
                    <div class="product_carousel product_column5 owl-carousel">

                        <?php
                        $sql = "SELECT * FROM `products` ";
                        $stmt = $conn->query($sql);
                        while ($row = $stmt->fetch()) {
                        ?>
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a>
                                        <a class="secondary_img" href="product-details.php?id=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['image2'] ?>" alt=""></a>
                                        <div class="label_product"> <span class="label_sale">Sale</span> <span class="label_new">New</span> </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart">
                                                    <?php if (isset($_SESSION['id'])) {
                                                        echo '<a class="add-to-cart" data-product-id="' . $row["id"] . '" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                    } else {
                                                        echo '<a href="login.php" data-tippy="FRIST LOGIN" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a>';
                                                    } ?>
                                                </li>
                                                <li class="quick_button">
                                                    <a href="product-details.php?id=<?php echo $row['id'] ?>"> <span class="lnr lnr-magnifier"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.php">Mauris Vel Tellus</a></h4>
                                        <p><a href="#">Fruits</a></p>
                                        <div class="price_box"> <span class="current_price">$<?php echo $row['salesPrice'] ?></span> <span class="old_price">$<?php echo $row['actualPrice'] ?></span> </div>
                                    </figcaption>
                                </figure>
                            </article>
                        <?php }; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product area end-->
<!--blog area start-->

<!--blog area end-->
<!--custom product area start-->

<!--custom product area end-->
<!--brand area start-->
<!--brand area start-->
<div class="brand_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand_container owl-carousel ">
                    <div class="single_brand">
                        <a href="#"><img src="assets/img/brand/brand1.jpg" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="assets/img/brand/brand2.jpg" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="assets/img/brand/brand3.jpg" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="assets/img/brand/brand4.jpg" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="assets/img/brand/brand2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--brand area end-->
<!--brand area end-->
<!--footer area start-->
<?php include("includes/footer.php"); ?>