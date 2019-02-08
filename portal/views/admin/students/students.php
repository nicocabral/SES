<?php include('addStudent.php');?>
<div class="row">
	<div class="col-md-12">
		<i class="fas fa-user-graduate"></i> Students
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="float-right">
			<button type="button" class="btn btn-default btnRefresh" data-toggle="tooltip" data-original-title="Refresh table"><i class="fas fa-sync-alt"></i></button>	
			<button type="button" class="btn btn-info btnAdd">Add Student</button>	
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		
		<table class="table table-bordered table-hover table-striped" width="100%" id="studentsTable">
			<thead>
				<tr>
					<th>Student No.</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Contact Number</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="loader"></tbody>
		</table>
	</div>
</div>
