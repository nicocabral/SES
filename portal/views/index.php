<?php 
include('includes/headers.php');
?>
<?php include('includes/nav.php');?>
<div class="container">
	<br>
	<?php 
		include('../app/middleware/Middleware.php');

		$middleware = new Middleware();
		if($middleware->verifySession()) {
			include('admin/myaccount.php');
			if(isset($_GET["page"])) {
				switch (strtolower($_GET["page"])) {
					case 'students':
						if($middleware->checkUserType(['user'])){
							include('admin/students/students.php');
							include('includes/scripts.php');
							echo '<script src="../assets/js/wizard/js/jquery.smartWizard.min.js"></script><br>';
							echo '<script src="../assets/js/admin/students.js"></script>';
						} else {
							echo '<div class="alert alert-warning" role="alert">
								  Your not authorized to access this page
								</div>';
						}
						break;
					case 'subjects':
						if($middleware->checkUserType(['user'])){
							include('admin/subjects/subjects.php');
							include('includes/scripts.php');
							echo '<script src="../assets/js/admin/subjects.js"></script>';
						} else {
							echo '<div class="alert alert-warning" role="alert">
								  Your not authorized to access this page
								</div>';
						}
						break;
					case 'users':
						if($middleware->checkUserType(['user'])){
							include('admin/users/users.php');
							include('includes/scripts.php');
							echo '<script src="../assets/js/admin/users.js"></script>';
						} else {
							echo '<div class="alert alert-warning" role="alert">
								  Your not authorized to access this page
								</div>';
						}
						break;

					case 'enrollment':
						if($middleware->checkUserType(['user','student'])){
							include('admin/enrollment/enrollment.php');
							include('includes/scripts.php');
							echo '<script src="../assets/js/admin/enrollment.js"></script>';
						} else {
							echo '<div class="alert alert-warning" role="alert">
								  Your not authorized to access this page
								</div>';
						}
						break;
					case 'sections':
						if($middleware->checkUserType(['user'])){
							include('admin/sections/sections.php');
							include('includes/scripts.php');
							echo '<script src="../assets/js/admin/sections.js"></script>';
						} else {
							echo '<div class="alert alert-warning" role="alert">
								  Your not authorized to access this page
								</div>';
						}
						break;
					case 'aboutus':
						if($middleware->checkUserType(['user','student'])){
							include('admin/aboutus/aboutus.php');
							include('includes/scripts.php');
							echo '<script src="../assets/js/admin/aboutus.js"></script>';
						} else {
							echo '<div class="alert alert-warning" role="alert">
								  Your not authorized to access this page
								</div>';
						}
						break;
					default:
						include('admin/404.php');
						break;
				}
			} else {
				
				include('admin/index.php');
				include('includes/scripts.php');
				echo '<script src="../assets/js/page/index.js"></script>';
			}
		} else {
			include('auth/changepassword.php');
			include('auth/login.php');
			include('includes/scripts.php');
		}
		
	
	?>
</div>



