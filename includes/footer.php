<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-7">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="index.php">
                                <h3>SAI BALAJI</h3>
                            </a>
                        </div>
                        <p class="footer_desc">We are a team of designers and developers that create high quality eCommerce, WordPress, Shopify .</p>
                        <p><span>Address:</span> 4710-4890 Breckinridge USA</p>
                        <p><span>Email:</span> <a href="#">demo@hasthemes.com</a></p>
                        <p><span>Call us:</span> <a href="tel:(08)23456789">(08) 23 456 789</a> </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#"> Privacy Policy</a></li>
                                <li><a href="#"> Terms & Conditions</a></li>
                                <li><a href="contact.php"> Contact Us</a></li>
                                <li><a href="#"> Site Map</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="widgets_container widget_menu">
                        <h3>Extras</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Brands</a></li>
                                <li><a href="#"> Gift Certificates</a></li>
                                <li><a href="#">Affiliate</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#"> Order History</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="widgets_container widget_newsletter">
                        <h3>Sign up newsletter</h3>
                        <p class="footer_desc">Get updates by subscribe our weekly newsletter</p>
                        <div class="subscribe_form">
                            <form id="mc-form" class="mc-form footer-newsletter">
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email" />
                                <button id="mc-submit">Subscribe</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div>
                                <!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div>
                                <!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div>
                                <!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <div class="copyright_area">
                        <p>Copyright © 2021 <a href="#">Safira</a> . All Rights Reserved.Design by <a href="#">Safira</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="footer_payment">
                        <ul>
                            <li>
                                <a href="#"><img src="assets/img/icon/paypal1.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="assets/img/icon/paypal2.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="assets/img/icon/paypal3.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="assets/img/icon/paypal4.jpg" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->
<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="icon-x"></i></span> </button>
            <div class="modal_body">
                <?php
                // $id = $_POST['product_id'];
                // //product
                // $sql = "SELECT * FROM `products` WHERE `id`='$id' ";
                // $stmt = $conn->query($sql);
                // $row = $stmt->fetch();
                // $categoryName = $row['categoryName'];
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="product-details-tab">
                                <div id="img-1" class="zoomWrapper single-zoom">
                                    <a href="#">
                                        <img id="zoom1" src="upload/product/<?php echo $row['image'] ?>" data-zoom-image="upload/product/<?php echo $row['image'] ?>" alt="big-1">
                                    </a>
                                </div>
                                <div class="single-zoom-thumb">
                                    <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="upload/product/<?php echo $row['image2'] ?>" data-zoom-image="upload/product/<?php echo $row['image2'] ?>">
                                                <img src="upload/product/<?php echo $row['image2'] ?>" alt="zo-th-1" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="upload/product/<?php echo $row['image3'] ?>" data-zoom-image="upload/product/<?php echo $row['image3'] ?>">
                                                <img src="upload/product/<?php echo $row['image3'] ?>" alt="zo-th-1" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="upload/product/<?php echo $row['image4'] ?>" data-zoom-image="upload/product/<?php echo $row['image4'] ?>">
                                                <img src="upload/product/<?php echo $row['image4'] ?>" alt="zo-th-1" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="upload/product/<?php echo $row['image5'] ?>" data-zoom-image="upload/product/<?php echo $row['image5'] ?>">
                                                <img src="upload/product/<?php echo $row['image5'] ?>" alt="zo-th-1" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="product_d_right">
                                <form action="#">

                                    <h1><a href="#"><?php echo $row['productName'] ?></a></h1>

                                    <div class=" product_ratting">
                                        <ul>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li class="review"><a href="#"> (customer review ) </a></li>
                                        </ul>

                                    </div>
                                    <div class="price_box">
                                        <span class="current_price">₹<?php echo $row['salesPrice'] ?></span>
                                        <span class="old_price">₹<?php echo $row['actualPrice'] ?></span>

                                    </div>
                                    <div class="product_desc">
                                        <p><?php echo $row['description'] ?></p>
                                    </div>
                                    <div class="product_variant quantity">
                                        <form action="">
                                            <label>quantity</label>
                                            <input min="1" max="100" name="quantity" value="1" type="number">
                                            <button data-product-id="<?php echo $row['id'] ?>" class="button add-to-cart-product" type="submit">add to cart</button>
                                        </form>
                                    </div>
                                    <div class="product_meta">
                                        <span>Category: <a href="#"><?php echo $row['categoryName'] ?></a></span>
                                    </div>

                                </form>
                                <div class="priduct_social">
                                    <ul>
                                        <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                        <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                        <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                        <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                        <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->
<!--news letter popup start-->
<div class="newletter-popup">
    <div id="boxes" class="newletter-container">
        <div id="dialog" class="window">
            <div id="popup2"> <span class="b-close"><span>close</span></span>
            </div>
            <div class="box">
                <div class="newletter-title">
                    <h2>Newsletter</h2>
                </div>
                <div class="box-content newleter-content">
                    <label class="newletter-label">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
                    <div id="frm_subscribe">
                        <form name="subscribe" id="subscribe_popup">
                            <!-- <span class="required">*</span><span>Enter you email address here...</span>-->
                            <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail" placeholder="Enter you email address here...">
                            <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                            <div id="notification"></div> <a class="theme-btn-outlined" onclick="email_subscribepopup()"><span>Subscribe</span></a>
                        </form>
                        <div class="subscribe-bottom">
                            <input type="checkbox" id="newsletter_popup_dont_show_again">
                            <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                        </div>
                    </div>
                    <!-- /#frm_subscribe -->
                </div>
                <!-- /.box-content -->
            </div>
        </div>
    </div>
    <!-- /.box -->
</div>
<!--news letter popup start-->
<!-- JS
============================================ -->
<!--jquery min js-->
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="assets/js/slinky.menu.js"></script>
<!--instagramfeed menu js-->
<script src="assets/js/jquery.instagramFeed.min.js"></script>
<!-- tippy bundle umd js -->
<script src="assets/js/tippy-bundle.umd.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>
<!-- website js -->
<script src="assets/js/website.js"></script>
<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</body>
<!-- Mirrored from htmldemo.net/safira/safira/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Apr 2023 09:20:37 GMT -->

</html>