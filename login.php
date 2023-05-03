<?php include("includes/header.php"); ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Login</h3>
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login">
    <div class="product_tab_btn">
        <ul class="nav" role="tablist" id="nav-tab">
            <li> <a class="active" data-toggle="tab" href="#LOGIN" role="tab" aria-controls="plant1" aria-selected="true">
                    LOGIN
                </a> </li>
            <li> <a data-toggle="tab" href="#REGISTER" role="tab" aria-controls="plant2" aria-selected="false">
                    REGISTER
                </a> </li>
        </ul>
    </div>
    <br><br>
    <div class="container">
        <div class=" tab-content">
            <!--login area start-->
            <div class="col-lg-6 col-md-6 mx-auto tab-pane fade show active" id="LOGIN" role="tabpanel">
                <div class="account_form">
                    <h2>login</h2>
                    <form id="customerLogin">
                        <p>
                            <label> email <span>*</span></label>
                            <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        </p>
                        <p>
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="password" id="password" required>
                        </p>
                        <!-- <p>
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+~`|\\{}[\]:]).{8,}" required>
                        </p> -->
                        <div class="login_submit">
                            <a href="forgotpassword.php">Lost your password?</a>
                            <label for="remember">
                                <input id="remember" type="checkbox">
                                Remember me
                            </label>
                            <button type="submit">login</button>

                        </div>

                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6 mx-auto tab-pane fade" id="REGISTER" role="tabpanel">
                <div class="account_form register">
                    <h2>Register</h2>
                    <form id="registerForm">
                        <p>
                            <label>Name<span>*</span></label>
                            <input type="text" name="customerName" pattern="[a-zA-Z' -]{3,}" required />
                        </p>
                        <p>
                            <label>Email address <span>*</span></label>
                            <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        </p>
                        <p>
                            <label>Mobile <span>*</span></label>
                            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" required>
                        </p>
                        <p>
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+~`|\\{}[\]:]).{8,}" required>
                        </p>
                        <div class="login_submit">
                            <button type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div>
<!-- customer login end -->
<?php include("includes/footer.php"); ?>