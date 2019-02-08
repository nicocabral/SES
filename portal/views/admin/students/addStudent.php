<div class="modal fade bd-example-modal-xl" id="modal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered  modal-xl" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body loader">
         <!-- Smart Wizard HTML -->
         <form id="studentForm" data-parsley-validate>
          <div id="smartwizard">
              <ul>
                  <li><a href="#step-1">Details</a></li>
                  <li><a href="#step-2">Family Information</a></li>
                  <li><a href="#step-3">Strand</a></li>
              </ul>

              <div>
                  <div id="step-1" class="">

                      <div class="form-group">
                            <br>
                            <small>Fields with (<span class="text-danger">*</span>) are required.</small>
                          </div>
                         
                            <div class="form-group">
                              <label>Student no <span class="text-danger">*</span></label>
                              <input type="text" class="form-control username" name="username" placeholder="Enter student no" required>
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
                                <label>Address</label>
                                <textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Status</label>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="status" class="custom-control-input status" id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1">Active</label>
                                </div>
                              </div>
                            </div>
                          </div>
                  </div>
                  <div id="step-2" class="">
                    <br>
                     <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Mother's Name</label>
                                <input type="text" class="form-control" name="famInfo_mName" data-type="meta">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Father's Name</label>
                                <input type="text" class="form-control" name="famInfo_fName" data-type="meta">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Guardian's Name</label>
                                <input type="text" class="form-control" name="famInfo_gName" data-type="meta">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Guardian's Contact No.</label>
                                <input type="text" class="form-control" name="famInfo_gContactNo" data-type="meta">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Address</label>
                                <textarea name="famInfo_gAddress" id="famInfo_gAddress" cols="30" rows="5" class="form-control" data-type="meta"></textarea>
                              </div>
                            </div>
                          </div>
                  </div>
                  <div id="step-3" class="">
                    <br>
                     <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Strand</label>
                                  <select name="studStrand" class="form-control">
                                    <option value="ABM">ABM</option>
                                    <option value="HUMSS">HUMSS</option>
                                    <option value="GAS">GAS</option>
                                    <option value="TVL">TVL</option>
                                    <option value="TVL_ICT_PROGRAMMING">TVL ICT PROGRAMMING</option>
                                    <option value="TVL_ICT_CCS">TVL ICT CCS</option>
                                    <option value="TVL_HOME_ECONOMIC">TVL HOME ECONOMIC</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Grade</label>
                                <select name="studGrade" id="studGrade" class="form-control">
                                  <option value="Grade_11">Grade 11</option>
                                  <option value="Grade_12">Grade 12</option>
                                </select>
                              </div>
                            </div>
                          </div>
                  </div>
              </div>
          </div>
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