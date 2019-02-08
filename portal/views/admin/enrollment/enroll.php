<div class="modal fade bd-example-modal-xl" id="enrollmentModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered  modal-xl" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enrollment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body loader">
       <?php if($_SESSION["userData"]["type"] == "student"){
              if($_SESSION["userData"]["status"] == "Enrolled") {
                ?>
          <form id="sectionForm" data-parsley-validate>
            <fieldset>
              <div class="row">
                <div class="col-md-12">
                  <label >Student ID:<span class="studentId"></span></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Grade & Section <span class="text-danger">*</span></label>
                    <select name="yearAndSection" id="yearAndSection" class="form-control yearAndSection" <?php if(strtolower($_SESSION["userData"]["type"]) === "student"){
                      echo 'disabled';
                    }?>>
                    </select>
                    
                  </div>
                </div>
              </div>
               <br>
               <hr>
               <div class="row">
                 <div class="col-md-12">
                   <label>Subjects</label>
                   <table class="table table-bordered table-striped table-condensed table-hover" width="100%" id="subjectsTable">
                     <thead>
                       <tr>
                         <th>Subject Code</th>
                         <th>Subject Name</th>
                         <td>Schedules</td>
                       </tr>
                     </thead>
                     <tbody>
                     </tbody>
                   </table>
                 </div>
               </div>
            </fieldset>

          </form>
        <?php
              } else {
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-warning">
                      <i class="fas fa-info-circle"></i> Not yet enrolled
                    </div>
                  </div>
                </div>
                <?php 
              }
       } else {?>
        <form id="sectionForm" data-parsley-validate>
            <fieldset>
              <div class="row">
                <div class="col-md-12">
                  <label >Student ID:<span class="studentId"></span></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Grade & Section <span class="text-danger">*</span></label>
                    <select name="yearAndSection" id="yearAndSection" class="form-control yearAndSection" <?php if(strtolower($_SESSION["userData"]["type"]) === "student"){
                      echo 'disabled';
                    }?>>
                    </select>
                    
                  </div>
                </div>
              </div>
               <br>
               <hr>
               <div class="row">
                 <div class="col-md-12">
                   <label>Subjects</label>
                   <table class="table table-bordered table-striped table-condensed table-hover" width="100%" id="subjectsTable">
                     <thead>
                       <tr>
                         <th>Subject Code</th>
                         <th>Subject Name</th>
                         <td>Schedules</td>
                       </tr>
                     </thead>
                     <tbody>
                     </tbody>
                   </table>
                 </div>
               </div>
            </fieldset>

        </form>
      <?php } ?>
      </div>
      <div class="modal-footer">
        <?php if(strtolower($_SESSION["userData"]["type"]) !== "student"){ ?>
        <button type="button" class="btn btn-info btnEnroll" data-loading-text="<i class='fas fa-circle-notch fa-spin'></i> Enrolling..." 
          
          <?php  

          if(strtolower($_SESSION["userData"]["type"]) == "student") {
            echo 'disabled';
          }

          ?>>Enroll</button>
        <?php }?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>