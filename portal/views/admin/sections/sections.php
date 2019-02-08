<?php 
include('addSection.php');
include('subjects.php');
?>
<div class="row">
	<div class="col-md-12">
		<i class="fas fa-clipboard-list"></i> Sections
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="float-right">
			<button type="button" class="btn btn-default btnRefresh" data-toggle="tooltip" data-original-title="Refresh table"><i class="fas fa-sync-alt"></i></button>
			<button type="button" class="btn btn-info btnAdd">Add Section</button>	
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		
		<table class="table table-bordered table-hover table-striped" width="100%" id="sectionsTable">
			<thead>
				<tr>
					<th>Name</th>
					<th>Year</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="loader"></tbody>
		</table>
	</div>
</div>
