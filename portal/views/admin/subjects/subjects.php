<?php 
include('addSubjects.php');
include('schedules.php');
?>
<div class="row">
	<div class="col-md-12">
		<i class="fas fa-book"></i> Subjects
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="float-right">
			<button type="button" class="btn btn-default btnRefresh" data-toggle="tooltip" data-original-title="Refresh table"><i class="fas fa-sync-alt"></i></button><button type="button" class="btn btn-default btnSections" data-toggle="tooltip" data-original-title="Section list">Sections</button>
			<button type="button" class="btn btn-info btnAdd">Add Subject</button>	
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		
		<table class="table table-bordered table-hover table-striped" width="100%" id="subjectsTable">
			<thead>
				<tr>
					<th>Subject Code</th>
					<th>Name</th>
					<th>Description</th>
					<th>Unit</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="loader"></tbody>
		</table>
	</div>
</div>
