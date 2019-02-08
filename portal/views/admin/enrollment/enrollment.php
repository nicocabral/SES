<?php include('enroll.php');?>
<div class="row">
	<div class="col-md-12">
		<i class="fas fa-sign-in-alt"></i> Enrollment
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<label>Student list</label>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="float-right">
			<a href="javascrpt:void(0);"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			    <i class="fas fa-filter"></i> Filter
			</a>
		</div>
	</div>
	<div class="col-md-12">
		<div class="collapse" id="collapseExample">
		<div class="row">
			<div class="col-md-4">	
			  <div class="form-group">
			  	<label>Grade or Year</label>
			  	<select name="gradeOrYear" class="form-control year" >
			  		<option value="">--SELECT--</option>
			  	</select>
			  </div>
			</div>
		</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		
		<table class="table table-bordered table-hover table-striped" width="100%" id="studentsTable">
			<thead>
				<tr>
					<th>Student No</th>
					<th>Student Name</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody class="loader"></tbody>
		</table>
	</div>
</div>

