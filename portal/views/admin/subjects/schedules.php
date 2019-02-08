<div class="modal fade bd-example-modal-xl" id="scheduleModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered  modal-xl" role="document" >
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body loader" id="schedContent">
        <form id="schedForm" data-parsley-validate>
            <fieldset>
              <div class="row">
                <div class="col-md-12">
                  <label>Schedule's</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="name" data-value="Lecture" class="custom-control-input sName" value="Lecture" checked="true">
                        <label class="custom-control-label" for="customRadio1">Lecture</label>
                        <input type="hidden" name="subjectId" id="subjectId">
                      </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="name" data-value="Lab" class="custom-control-input sName" value="Lab">
                        <label class="custom-control-label" for="customRadio2">Lab</label>
                      </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Units <span class="text-danger">*</span></label>
                    <input type="number" class="form-control sUnit" name="unit" required>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Day<span class="text-danger">*</span></label>
                    <select name="timeDay" id="timeDay" class="form-control" required>
                      <option value="Mon">Mon</option>
                      <option value="Tue">Tue</option>
                      <option value="Wed">Wed</option>
                      <option value="Thur">Thur</option>
                      <option value="Fri">Fri</option>
                      <option value="Sat">Sat</option>
                      <option value="Sun">Sun</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Time (Hour)<span class="text-danger">*</span></label>
                    <select name="timeHour" id="timeHour" class="form-control" required>
                      <option value="00">00</option>
                    <?php for($h=1;$h <=12; $h++){?>
                        <option value="<?php echo $h;?>"><?php echo $h;?></option>
                    <?php }?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Time (Minutes)<span class="text-danger">*</span></label>
                    <select name="timeMin" id="timeMin" class="form-control" required>
                      <option value="00">00</option>
                    <?php for($m=1;$m <=60; $m++){?>
                        <option value="<?php echo $m;?>"><?php echo $m;?></option>
                    <?php }?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>AM/PM<span class="text-danger">*</span></label>
                      <select name="suffix" id="suffix" class="form-control" required>
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                      </select>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-3">
                  <label>Status</label>
                  <select name="status" id="status" class="form-control">
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="float-right">
                    <button type="button" class="btn btn-default btnRefreshSched" data-toggle="tooltip" title="Refresh Schedule table" data-original-title="Refresh Schedule table"><i class="fas fa-sync-alt"></i></button>
                    <button type="button" class="btn btn-info btnSaveSched" data-loading-text="<i class='fas fa-circle-notch fa-spin'></i> Saving...">Save</button>
                  </div>
                </div>
              </div>
              <br>
              <hr>
            </fieldset>
        </form>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover table-bordered table-condensed table-striped" width="100%" id="schedulesList">
                <thead>
                  <tr>
                    <th>Schedule</th>
                    <td>Unit</td>
                    <td>Time</td>
                    <td>Status</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>