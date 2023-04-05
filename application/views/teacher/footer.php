<div class="footer">
    </div>
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-auto ml-lg-auto">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <!-- <li class="list-inline-item"><a href="<?=base_url()?>docs/index.html">Documentation</a></li>
                                    <li class="list-inline-item"><a href="<?=base_url()?>faq.html">FAQ</a></li> -->
                                </ul>
                            </div>
                        <div class="col-auto">
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                Copyright © 2018 <a href=".">MESOKI</a>. powered by
                <a href="http://primalcodes.com/" target="new">
                    <img src="<?= base_url() ?>assets/images/primalcode-icon.svg" height="20px" alt="Primal Codes Logo"> Primal Codes
                </a>
            </div>
        </footer>
    </div>

    <!-- modal -->

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reset Password</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="cur_pass" id="cur_pass" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="c_pass" id="c_pass" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="col-sm-12" id="reset-div" style="display:none">
                        <div id="reset-err" class="alert alert-warning">
                            Indicates a warning that might need attention.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary change-teacher-password-btn">Save</button>
            </div>
            </div>

        </div>
    </div>

    <!-- /modal -->

    <script src="<?=base_url()?>assets/js/functions.js?v=<?=time()?>"></script>
    
    </body>
</html>