<?php include("includes/header.php"); ?>

<!-- customer login start -->
<div class="customer_login">
    <div class="product_tab_btn">
        <ul class="nav" role="tablist" id="nav-tab">
            <li> <a class="active" data-toggle="tab" href="#LOGIN" role="tab" aria-controls="plant1" aria-selected="true">
                    FORGET PASSWORD
                </a> </li>
            
        </ul>
    </div>
    <br><br>
    <div class="container">
        <div class=" tab-content">
            <!--login area start-->
            <div class="col-lg-6 col-md-6 mx-auto tab-pane fade show active" id="LOGIN" role="tabpanel">
                <div class="account_form">
                    <form method="POST" action="admin/api/otp_mail.php">
                        <p>
                            <label> email <span>*</span></label>
                            <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="ENTER VALID MAIL ID" required>
                        </p>
                        <div class="login_submit">
                            <label for="remember">
                                <input id="remember" type="checkbox">
                                Remember me
                            </label>
                            <button type="submit">CONTINUE</button>

                        </div>

                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area end-->
        </div>
    </div>
</div>
<!-- customer login end -->
<?php include("includes/footer.php"); ?>