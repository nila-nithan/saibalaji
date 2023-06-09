<?php include("includes/header.php");?>
<?php
$id = $_GET['id'];
//product
$sql = "SELECT * FROM `products` WHERE `id`='$id' ";
$stmt = $conn->query($sql);
$row = $stmt->fetch();
$categoryName = $row['categoryName'];
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li>product details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details mt-70 mb-70">
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
<!--product details end-->

<!--product info start-->
<div class="product_d_info mb-65">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist" id="nav-tab">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                            </li>
                            <!-- <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p><?php echo $row['description'] ?></p>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="first_child">Compositions</td>
                                                <td>Polyester</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Styles</td>
                                                <td>Girly</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Properties</td>
                                                <td>Short Dress</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="product_info_content">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">
                                <h2>1 review for Donec eu furniture</h2>
                                <div class="reviews_comment_box">
                                    <div class="comment_thmb">
                                        <img src="assets/img/blog/comment2.jpg" alt="">
                                    </div>
                                    <div class="comment_text">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <p><strong>admin </strong>- September 12, 2018</p>
                                            <span>roadthemes</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="comment_title">
                                    <h2>Add a review </h2>
                                    <p>Your email address will not be published. Required fields are marked </p>
                                </div>
                                <div class="product_ratting mb-10">
                                    <h3>Your rating</h3>
                                    <ul>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_review_form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Your review </label>
                                                <textarea name="comment" id="review_comment"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input id="author" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <input id="email" type="text">
                                            </div>
                                        </div>
                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<!--product area start-->
<section class="product_area related_products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Related Products </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product_carousel product_column5 owl-carousel">
                    <?php $sql = "SELECT * FROM `products` WHERE `categoryName`='$categoryName' ";
                    $stmt = $conn->query($sql);
                    $row = $stmt->fetch();
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
                        </article>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--product area end-->

<!--product area start-->
<section class="product_area upsell_products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Upsell Products </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product_carousel product_column5 owl-carousel">
                    <?php $sql = "SELECT * FROM `products` ";
                    $stmt = $conn->query($sql);
                    $row = $stmt->fetch();
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
                        </article>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--product area end-->
<?php include("includes/footer.php"); ?>