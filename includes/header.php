<?php session_start(); ?>
<?php
include("config/database.php");
?>
<?php
$database = new Database();
$conn = $database->getConnection();
?>
<?php
if (isset($_SESSION['id'])) {
    $customerID = $_SESSION['id'];
    $totalsql = "SELECT * FROM `cart` WHERE `customerID` = '$customerID' ";
    $totalstmt = $conn->query($totalsql);
    $cartCount = $totalstmt->rowCount();
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sai Balaji SeaFood </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="assets/css/font.awesome.css">
    <!--ionicons css-->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!--linearicons css-->
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <!--animate css-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--modernizr min js here-->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
</head>

<body>
    <!--header area start-->
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay"> </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open"> <a href="javascript:void(0)"><i class="icon-menu"></i></a> </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close"> <a href="javascript:void(0)"><i class="icon-x"></i></a> </div>
                        <div class="language_currency">
                            <ul>
                                <li class="language"><a href="#"> Language <i class="icon-right ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Russian</a></li>
                                    </ul>
                                </li>
                                <li class="currency"><a href="#"> Currency <i class="icon-right ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#">€ Euro</a></li>
                                        <li><a href="#">£ Pound Sterling</a></li>
                                        <li><a href="#">$ US Dollar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="header_social text-right">
                            <ul>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                        <div class="call-support">
                            <p><a href="tel:(08)23456789">(08) 23 456 789</a> Customer Support</p>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active"> <a href="#">Home</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children"> <a href="#">Home Organic</a>
                                            <ul class="sub-menu">
                                                <li><a href="index.php">Organic 01</a></li>
                                                <li><a href="index.php">Organic 02</a></li>
                                                <li><a href="index.php">Organic 03</a></li>
                                                <li><a href="index.php">Organic 04</a></li>
                                                <li><a href="index.php">Organic 05</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"> <a href="#">Home Fashion</a>
                                            <ul class="sub-menu">
                                                <li><a href="index.php">Fashion 01</a></li>
                                                <li><a href="index.php">Fashion 02</a></li>
                                                <li><a href="#">Fashion 03 <span>(Comming Soon)</span></a></li>
                                                <li><a href="#">Fashion 04 <span>(Comming Soon)</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"> <a href="#">Home Cosmetic</a>
                                            <ul class="sub-menu">
                                                <li><a href="index.php">Cosmetic 01</a></li>
                                                <li><a href="index.php">Cosmetic 02</a></li>
                                                <li><a href="#">Cosmetic 03 <span>(Comming Soon)</span></a> </li>
                                                <li><a href="#">Cosmetic 04 <span>(Comming Soon)</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"> <a href="#">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children"> <a href="#">Shop Layouts</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.php">shop</a></li>
                                                <li><a href="shop-fullwidth.php">Full Width</a></li>
                                                <li><a href="shop-fullwidth-list.php">Full Width list</a></li>
                                                <li><a href="shop-right-sidebar.php">Right Sidebar </a></li>
                                                <li><a href="shop-right-sidebar-list.php"> Right Sidebar list</a></li>
                                                <li><a href="shop-list.php">List View</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"> <a href="#">other Pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="cart.php">cart</a></li>
                                                <li><a href="wishlist.php">Wishlist</a></li>
                                                <li><a href="checkout.php">Checkout</a></li>
                                                <li><a href="my-account.php">my account</a></li>
                                                <li><a href="404.php">Error 404</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"> <a href="#">Product Types</a>
                                            <ul class="sub-menu">
                                                <li><a href="product-details.php">product details</a></li>
                                                <li><a href="product-sidebar.php">product sidebar</a></li>
                                                <li><a href="product-grouped.php">product grouped</a></li>
                                                <li><a href="variable-product.php">product variable</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"> <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.php">blog</a></li>
                                        <li><a href="blog-details.php">blog details</a></li>
                                        <li><a href="blog-fullwidth.php">blog fullwidth</a></li>
                                        <li><a href="blog-sidebar.php">blog sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"> <a href="#">pages </a>
                                    <ul class="sub-menu">
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="services.php">services</a></li>
                                        <li><a href="faq.php">Frequently Questions</a></li>
                                        <li><a href="contact.php">contact</a></li>
                                        <li><a href="login.php">login</a></li>
                                        <li><a href="404.php">Error 404</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"> <a href="my-account.php">my account</a> </li>
                                <li class="menu-item-has-children"> <a href="about.php">about Us</a> </li>
                                <li class="menu-item-has-children"> <a href="contact.php"> Contact Us</a> </li>
                            </ul>
                        </div>
                        <div class="offcanvas_footer"> <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->
    <header>
        <div class="main_header">
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="language_currency">
                                <ul>
                                    <li class="language"><a href="#"> Language <i class="icon-right ion-ios-arrow-down"></i></a>
                                        <ul class="dropdown_language">
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Spanish</a></li>
                                            <li><a href="#">Russian</a></li>
                                        </ul>
                                    </li>
                                    <li class="currency"><a href="#"> Currency <i class="icon-right ion-ios-arrow-down"></i></a>
                                        <ul class="dropdown_currency">
                                            <li><a href="#">€ Euro</a></li>
                                            <li><a href="#">£ Pound Sterling</a></li>
                                            <li><a href="#">$ US Dollar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header_social text-right">
                                <ul>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-3">
                            <div class="logo">
                                <a href="index.php">
                                    <h3>SAI BALAJI</h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-7 col-8">
                            <div class="header_right_info">
                                <div class="search_container mobail_s_none">
                                    <form action="shop.php">
                                        <div class="hover_category">
                                            <select class="categories" name="category" id="category" >
                                                <option selected value="1">Select a category</option>
                                            </select>
                                        </div>
                                        <div class="search_box">
                                            <input name="productName" placeholder="Search product..." type="text">
                                            <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="header_account_area">
                                    <div class="header_account_list register">
                                        <ul>
                                            <?php if (isset($_SESSION['id'])) {
                                                $customerName = $_SESSION['customerName'];
                                                echo '<li><a href="#"><h5>Hello</h5></a></li>
                                            <li><span><a href="my-account.php"><i class="fa fa-user text-green" data-tippy="PROFILE" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"></i></a></span></li>
                                            <li><a href="my-account.php"><h4>' . $customerName . '</h4></a></li>  <a href="logout.php"><i class="fa fa-sign-out text-green" data-tippy="LOG OUT" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"></i></a>';
                                            } else {
                                                echo ' <ul>
                                           <li><a href="login.php">Register</a></li>
                                           <li><span>/</span></li>
                                           <li><a href="login.php">Login</a></li>
                                       </ul>';
                                            } ?>
                                        </ul>
                                    </div>
                                    <!-- <div class="header_account_list  mini_cart_wrapper"> <a href="javascript:void(0)"><span class="lnr lnr-cart"></span><span class="item_count">2</span></a> -->
                                    <?php if (isset($_SESSION['id'])) {
                                        echo '<div class="header_account_list  mini_cart_wrapper"> <a href="cart.php"><span class="lnr lnr-cart"></span><span class="item_count">' . $cartCount . '</span></a></div>';
                                    } else {
                                        echo '<div class="header_account_list  mini_cart_wrapper"> <a href="#"><span class="lnr lnr-cart"></span><span class="item_count">0</span></a></div>';
                                    } ?>
                                    <!-- <div class="header_account_list  mini_cart_wrapper"> <a href="cart.php"><span class="lnr lnr-cart"></span><span class="item_count"></span></a> -->


                                    <!--mini cart-->
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                    ?>
                                        <div class="mini_cart">
                                           
                                        </div>
                                    <?php } else { ?>
                                        <div class="mini_cart">
                                            <div class="cart_gallery">
                                                <div class="cart_close">
                                                    <div class="cart_text">
                                                        <h3>Log in</h3>
                                                    </div>
                                                    <div class="mini_cart_close"> <a href="javascript:void(0)"><i class="icon-x"></i></a> </div>
                                                </div>
                                            </div>

                                            <div class="mini_cart_footer">
                                                <div class="cart_button"> <a href="login.php"><i class="fa fa-user"></i> LOG IN</a> </div>
                                                <div class="cart_button"> <a href="login.php"><i class="fa fa-user"></i> REGISTER</a> </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!--mini cart end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 mobail_s_block">
                        <div class="search_container">
                            <form action="#">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori3">
                                        <option selected value="1">Select a categories</option>
                                        <option value="2">Accessories</option>
                                        <option value="3">Accessories & More</option>
                                        <option value="4">Butters & Eggs</option>
                                        <option value="5">Camera & Video </option>
                                        <option value="6">Mornitors</option>
                                        <option value="7">Tablets</option>
                                        <option value="8">Laptops</option>
                                        <option value="9">Handbags</option>
                                        <option value="10">Headphone & Speaker</option>
                                        <option value="11">Herbs & botanicals</option>
                                        <option value="12">Vegetables</option>
                                        <option value="13">Shop</option>
                                        <option value="14">Laptops & Desktops</option>
                                        <option value="15">Watchs</option>
                                        <option value="16">Electronic</option>
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="categories_menu">
                            <div class="categories_title">
                                <h2 class="categori_toggle">All Cattegories</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul id="allcategory">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--main menu start-->
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li><a class="active" href="index.php">home</a>
                                        <!-- <ul class="sub_menu home_sub_menu d-flex">
                                            <li><span>Organic</span>
                                                <ul>
                                                    <li><a href="index.php">Organic 01</a></li>
                                                    <li><a href="index.php">Organic 02</a></li>
                                                    <li><a href="index.php">Organic 03</a></li>
                                                    <li><a href="index.php">Organic 04</a></li>
                                                    <li><a href="index.php">Organic 05</a></li>
                                                </ul>
                                            </li>
                                            <li><span>Fashion</span>
                                                <ul>
                                                    <li><a href="index.php">Fashion 01</a></li>
                                                    <li><a href="index.php">Fashion 02</a></li>
                                                    <li><a href="#">Fashion 03 <span>(Comming Soon)</span></a></li>
                                                    <li><a href="#">Fashion 04 <span>(Comming Soon)</span></a></li>
                                                </ul>
                                            </li>
                                            <li><span>Cosmetic</span>
                                                <ul>
                                                    <li><a href="index.php">Cosmetic 01</a></li>
                                                    <li><a href="index.php">Cosmetic 02</a></li>
                                                    <li><a href="#">Cosmetic 03 <span>(Comming Soon)</span></a> </li>
                                                    <li><a href="#">Cosmetic 04 <span>(Comming Soon)</span></a></li>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </li>
                                    <li class="mega_items"><a href="shop.php">shop</a>
                                        <!-- <div class="mega_menu">
                                            <ul class="mega_menu_inner">
                                                <li><a href="#">Shop Layouts</a>
                                                    <ul>
                                                        <li><a href="shop-fullwidth.php">Full Width</a></li>
                                                        <li><a href="shop-fullwidth-list.php">Full Width list</a></li>
                                                        <li><a href="shop-right-sidebar.php">Right Sidebar </a></li>
                                                        <li><a href="shop-right-sidebar-list.php"> Right Sidebar list</a></li>
                                                        <li><a href="shop-list.php">List View</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">other Pages</a>
                                                    <ul>
                                                        <li><a href="cart.php">cart</a></li>
                                                        <li><a href="wishlist.php">Wishlist</a></li>
                                                        <li><a href="checkout.php">Checkout</a></li>
                                                        <li><a href="my-account.php">my account</a></li>
                                                        <li><a href="404.php">Error 404</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Product Types</a>
                                                    <ul>
                                                        <li><a href="product-details.php">product details</a></li>
                                                        <li><a href="product-sidebar.php">product sidebar</a></li>
                                                        <li><a href="product-grouped.php">product grouped</a></li>
                                                        <li><a href="variable-product.php">product variable</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div> -->
                                    </li>
                                    <li><a href="blog.php">blog</a>
                                        <!-- <ul class="sub_menu pages">
                                            <li><a href="blog-details.php">blog details</a></li>
                                            <li><a href="blog-fullwidth.php">blog fullwidth</a></li>
                                            <li><a href="blog-sidebar.php">blog sidebar</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a href="#">pages </a>
                                        <!-- <ul class="sub_menu pages">
                                            <li><a href="about.php">About Us</a></li>
                                            <li><a href="services.php">services</a></li>
                                            <li><a href="faq.php">Frequently Questions</a></li>
                                            <li><a href="contact.php">contact</a></li>
                                            <li><a href="login.php">login</a></li>
                                            <li><a href="404.php">Error 404</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a href="contact.php"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="call-support">
                            <p><a href="tel:(08)23456789">(08) 23 456 789</a> Customer Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>