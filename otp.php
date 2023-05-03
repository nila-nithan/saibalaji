<?php include("includes/header.php"); ?>
<?php $email = $_SESSION['otpmail'];?>
<!-- customer login start -->
<div class="customer_otp">
    <div class="product_tab_btn">
        <ul class="nav" role="tablist" id="nav-tab">
            <li>
                <a class="active" data-toggle="tab" href="#LOGIN" role="tab" aria-controls="plant1" aria-selected="true">OTP SECTION</a>
            </li>
        </ul>
    </div>
    <br><br>
    <div class="container">
        <div class=" tab-content">
            <!--login area start-->
            <div class="col-lg-6 col-md-6 mx-auto tab-pane fade show active" id="LOGIN" role="tabpanel">
                <div class="">
                    <div class="container otp height-100 d-flex justify-content-center align-items-center">
                        <div class="position-relative">
                            <div class="card p-2 text-center">
                                <h6>Please enter the one time password <br> to verify your account</h6>
                                <div> <span>A code has been sent to</span> <small>emailid</small> </div>
                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
                                    <input class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" required/> <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="fifth" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="sixth" maxlength="1" /> 
                                </div>
                                <input type="hidden" name="email" value="<?php echo $email?>">
                                <div class="mt-4"> <button class="btn btn-danger px-4 validate">Validate</button> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <br><br>
        </div>
    </div>
</div>
<!-- customer login end -->
<?php include("includes/footer.php"); ?>