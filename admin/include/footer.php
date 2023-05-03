<script>
    const service_request_id = '';
    const cus_id = '';
    const service_id = '';
    const car_id = '';
    const workshop_id = '';
</script>
</div>
<!-- GLOBAL SCRIPTS -->
<script src="js/jquery.min.js"></script>
<script src="js/plugins/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/plugins/popupoverlay/jquery.popupoverlay.js"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Password Change</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="chng_pass">
                <form method="" action="" id="change_pass">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Old Password</label>
                        <input type="text" class="form-control" name="oldpass" id="oldpass" aria-describedby="emailHelp" placeholder="Enter Your Old Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+~`|\\{}[\]:]).{8,}" required />
                        <small id="emailHelp" class="form-text text-muted">must fill 8 charecter include Aa@1.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="text" class="form-control" name="newpass" id="newpass" placeholder="Enter Your New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+~`|\\{}[\]:]).{8,}"required>
                    </div>
                    <button type="submit" id="btn-chng_pass" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- script page connection -->
<script src="./js/adminPanel.js"></script>
<!-- Logout Notification jQuery -->
<script src="js/plugins/popupoverlay/logout.js"></script>
<!-- HISRC Retina Images -->
<script src="js/plugins/hisrc/hisrc.js"></script>
<!-- Date Range Picker -->
<script src="js/plugins/daterangepicker/moment.js"></script>
<script src="js/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Easy Pie Chart -->
<!-- DataTables -->
<script src="js/plugins/datatables/jquery.dataTables.js"></script>
<script src="js/plugins/datatables/datatables-bs3.js"></script>
<!-- THEME SCRIPTS -->
<script src="js/flex.js"></script>
<script src="js/demo/advanced-tables-demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script type="text/javascript" src="js/dash_board.js"></script> -->
</body>
</html>
<?php include("script.php"); ?>