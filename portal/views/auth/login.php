<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<form action="../app/http/login.php" method="post" id="loginForm">
		  <fieldset>
		    <legend><i class="fas fa-sign-in-alt"></i> Login</legend>
		    <div class="form-group">
		    	<small>Direction if student use student number, otherwise use username.</small>
		    </div>
		    <div class="form-group">
		  
		    	<?php if(isset($_SESSION["loginResult"]) && !$_SESSION["loginResult"]["success"]) { ?>
			    	<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <i class="fas fa-exclamation-circle"></i> <?php echo $_SESSION["loginResult"]["message"];?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
		    	<?php } unset($_SESSION["loginResult"]) ;?>
		    </div>
		    <div class="form-group">
		      <label>Username</label>
		      <input type="text" class="form-control" name="username" placeholder="Enter username">
		    </div>
		    <div class="form-group">
		      <label>Password</label>
		      <input type="password" class="form-control" name="password" placeholder="Enter password">
		    </div>
		    <button type="submit" class="btn btn-info btnLogin" data-loading-text="<i class='fas fa-circle-notch fa-spin'></i> Logging in...">Login</button>
		    <a href="#" class="text-info btnChangePassword float-right mt-4"><i class="fas fa-question-circle"></i>Change Password</a>
		    <br>
		    <br>
		    <center>ACLC COLLEGE OF TACLOBAN <br> &COPY <?php echo date("Y"); ?></center>
		  </fieldset>
		</form>
	</div>
</div>