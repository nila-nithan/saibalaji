<?php include("includes/header.php");?>
<?php
$customerID = $_SESSION['id'];
$order_id = $_POST['order_id'];
//cart
$sql = "SELECT * FROM `orders` JOIN `products` ON `products`.`id` = `orders`.`product_id` WHERE `orders`.`customer_id` = '$customerID' AND `orders`.`order_id`= '$order_id' ";
$stmt = $conn->query($sql);

//cart total
$totalsql = "SELECT * FROM `cart` WHERE `customerID` = '$customerID' ";
$totalstmt = $conn->query($totalsql);
$totalrow = $totalstmt->fetchAll(PDO::FETCH_ASSOC);
$total = 0;
foreach ($totalrow as $row) {
    $total += $row['total'];
}

$addresssql = "SELECT * FROM `customeraddress` WHERE `customerID` = '$customerID' ";
$addressstmt = $conn->query($addresssql);
$num_rows = $addressstmt->rowCount();
$addressrow = $addressstmt->fetch(PDO::FETCH_ASSOC);

?>
<!--breadcrumbs area start-->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="ORDER_content">
                <h3>ORDERS</h3>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area mt-23">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc bottomwidth">
                        <div class="cart_page">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">ORDER ID</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $stmt->fetch()) { ?>
                                        <tr>
                                            <td class="order_id"><a href="#"><?php echo $row['order_id'] ?></a></td>
                                            <td class="product_thumb"><a href="#"><img src="upload/product/<?php echo $row['image'] ?>" alt=""></a></td>
                                            <td class="product_name"><a href="#"><?php echo $row['productName'] ?></a></td>
                                            <td class="product-price">₹<?php echo $row['salesPrice'] ?></td>
                                            <td class="product_quantity"><label> <span><?php echo $row['quantity'] ?></span></label> </td>
                                            <td class="product_total">₹<?php echo $row['total'] ?></td>
                                        </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!--GO BACK-->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="ORDER_content footerbottom">
            <button type="button" class="btn btn-success"><a href="my-account.php">GO BACK</a></button>
            </div>
        </div>
    </div>
</div>
<!--shopping cart area end -->
<?php include("includes/footer.php"); ?>