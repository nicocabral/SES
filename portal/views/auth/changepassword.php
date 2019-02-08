<div class="modal fade bd-example-modal-xl" id="changePassword" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered  modal-xl" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body loader">
        <form id="changePasswordForm" data-parsley-validate>
            <fieldset>
              <div class="form-group">
                <small>Direction if student use student number, otherwise use username.</small>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control username" name="cusername" placeholder="Enter Username" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="cpassword" placeholder="*********" required>
                  </div>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="cnewpassword" placeholder="*********" required>
                  </div>
                </div>
  
              </div>
            </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnProceedChangePassword" data-loading-text="<i class='fas fa-circle-notch fa-spin'></i> Saving...">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>