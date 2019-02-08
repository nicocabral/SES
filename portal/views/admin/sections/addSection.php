<div class="modal fade bd-example-modal-xl" id="modal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered  modal-xl" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body loader">
        <form id="sectionForm" data-parsley-validate>
            <fieldset>
              <legend>Details</legend>
              <div class="form-group">
                <small>Fields with (<span class="text-danger">*</span>) are required.</small>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control name" name="name" placeholder="Enter name" required>
                    <input type="hidden" name="id" id="id">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Grade <span class="text-danger">*</span></label>
                    <select name="year" id="year" class="form-control year">
                      <option value="Grade_11">Grade 11</option>
                      <option value="Grade_12">Grade 12</option>
                    </select>
                  </div>
                </div>
              </div>
               <br>
               <hr>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-hover table-bordered table-condensed table-striped" width="100%" id="subjectsTable">
                    <thead>
                      <tr>
                        <th>Subject code</th>
                        <td>Subject Name</td>
                        <td>Schedule</td>
                        <td></td>
                      </tr>
                    </thead>
                    <tbody class="loader"></tbody>
                  </table>
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