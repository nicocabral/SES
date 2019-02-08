<div class="modal myaccountmodal fade bd-example-modal-xl" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered  modal-xl" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
        <?php if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"]) {
          echo $_SESSION["userData"]["lastname"] .', '.$_SESSION["userData"]["firstname"];
        }?>
          <br><span class="badge badge-pill badge-success">Online</span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body loader">
        <form id="myaccountForm" data-parsley-validate>
            <fieldset>
              <legend>Details</legend>
              <div class="form-group">
                <small>Fields with (<span class="text-danger">*</span>) are required.</small>
              </div>
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                     <label>Username <span class="text-danger">*</span></label>
                     <input type="text" class="form-control username" name="username" placeholder="Enter username" required value='<?php  echo $_SESSION["userData"]["username"];?>'>
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Firstname <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required value='<?php  echo $_SESSION["userData"]["firstname"];?>'>
                    
                  </div>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Lastname <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" required value='<?php  echo $_SESSION["userData"]["lastname"];?>'>
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email " value='<?php  echo $_SESSION["userData"]["email"];?>'>
                    
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Contact No.</label>
                  <input type="text" class="form-control" name="contactNumber" placeholder="Enter ex.+639177791947" value='<?php  echo $_SESSION["userData"]["contactNumber"];?>'>
                </div>
              </div>
            </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnSaveMyaccount" data-loading-text="<i class='fas fa-circle-notch fa-spin'></i> Saving...">Save</button>
        <button type="button" class="btn btn-danger btnResetPassword">Reset Password</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>