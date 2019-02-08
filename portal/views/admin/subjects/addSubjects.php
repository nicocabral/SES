<div class="modal fade bd-example-modal-xl" id="modal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered  modal-xl" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body loader">
        <form id="subjectForm" data-parsley-validate>
            <fieldset>
              <legend>Details</legend>
              <div class="form-group">
                <small>Fields with (<span class="text-danger">*</span>) are required.</small>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Subject Code<span class="text-danger">*</span></label>
                    <input type="text" class="form-control code" name="code" placeholder="Enter subject code" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                    
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Unit <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="unit" placeholder="Enter unit" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  <label>Status</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="status" class="custom-control-input status" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Active</label>
                    </div>
                </div>
              </div>
            </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnSave" data-loading-text="<i class='fas fa-circle-notch fa-spin'></i> Saving...">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>