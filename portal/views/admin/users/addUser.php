<div class="modal fade bd-example-modal-xl" id="modal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered  modal-xl" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body loader">
        <form id="userForm" data-parsley-validate>
            <fieldset>
              <legend>Details</legend>
              <div class="form-group">
                <small>Fields with (<span class="text-danger">*</span>) are required.</small>
              </div>
              <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control username" name="username" placeholder="Enter username" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label>Firstname <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Lastname <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" required>
                  </div>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact No.</label>
                    <input type="text" class="form-control" name="contactNumber" placeholder="Enter ex.+639177791947">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Status</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="status" class="custom-control-input status" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Active</label>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnSave" data-loading-text="<i class='fas fa-circle-notch fa-spin'></i> Saving...">Save</button>
        <button type="button" class="btn btn-danger btnResetpassword" data-loading-text="<i class='fas fa-circle-notch fa-spin'></i> resetting...">Reset Password</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>