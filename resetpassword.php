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
            <div class="col-lg-6 col-md-6 mx-auto tab-pane fade show active" role="tabpanel">
                <div class="account_form">
                    <h2>RESET PASSWORD</h2>
                    <form >
                        <p>
                            <label> email <span>*</span></label>
                            <input type="email" name="email" id="email" value="<?php echo $_SESSION['otpmail'] ?>">
                        </p>
                        <p>
                            <label>NEW Passwords <span>*</span></label>
                            <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+~`|\\{}[\]:]).{8,}" required>
                        </p>
                        <div class="login_submit">
                            <button type="submit" class="resetpin">CONTINUE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- customer login end -->
<?php include("includes/footer.php"); ?>