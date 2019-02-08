<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/datatable/js/jquery.dataTables.min.js"></script>
<script src="../assets/datatable/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/page/page.js"></script>
<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<script src="../assets/chart/Chart.min.js"></script>
<script src="../assets/js/loadingoverlay.min.js"></script>
<script src="../assets/js/parsley.min.js"></script>
<script>
	$.LoadingOverlaySetup({
	    background      : "rgba(255,255,255, 0.5)",
	    image           : "../assets/img/loader.gif",
	});
	$.LoadingOverlay("show");
	$(document).ready(function(){
		$.LoadingOverlay("hide");
	});
	$(document).on('click','.btnLogout', function(){
		swal({
			title: "Confirmation",
			text: "Are you sure you want to logout?",
			icon: "warning",
			buttons: [
				"Cancel",
				"Logout"
			],
			dangerMode: true
		})
		.then(logout => {
			if(logout) {
				window.location.href="../app/http/logout.php";
			}
		})
	});

	$(document).on('submit','#loginForm', function(){
		$('.btnLogin').buttonLoader("loading");
	})
	var token = $("meta[name=token]").attr('content');
	$.ajaxSetup({
	    headers: { 
	    	'Authorization': token
 	    },

	});
	$(document).ajaxStart(function(){

	    $(".loader").LoadingOverlay("show");
	});
	$(document).ajaxStop(function(){
	    $(".loader").LoadingOverlay("hide");
	});
	$( document ).ajaxError(function( event, request, settings ) {
	 switch(request.status) {
	 	case 401: 
	 		swal({
	 			title: "Warning",
	 			text : request.responseJSON.message,
	 			icon : 'warning',
	 			dangerMode: true
	 		});
	 		break;
	 }
	});
	const urlParams = new URLSearchParams(window.location.search);
	const myParam = urlParams.get('page');
	$('.nav-item').each(function(){
		if($(this).attr('data-href') === myParam) {

			$(this).addClass('active').not(this).removeClass('active');
		}
	})
	$(document).on('click','.myaccount', function(){
		$(".myaccountmodal").modal('show');
	});
	$(document).on('click','.btnResetPassword', function(){
		swal({
			title: "Reset Password",
		    content: {
			    element: "input",
			    attributes: {
			      placeholder: "Type your password",
			      type: "password",
			    },
		  },
		  icon: "info",
		  buttons : [
		  	"Cancel",
		  	{
		  		text: "Reset",
		  		closeModal: false
		  	}
		  ]
		}).then(ok => {
			if(ok) {
				swal({
					title: "Confirmation",
					text: "Are you sure you want to proceed?",
					icon: "warning",
					dangerMode: true,
					buttons: [
						"Cancel",
						{
							text: "Proceed",
							closeModal: false
						}
					]
				})
				.then(proceed => {
					if(proceed) {
						var id = <?php if(isset($_SESSION["userData"])){
											echo $_SESSION["userData"]["id"];
										} else {
											echo 0;
										}?>;

						$.post('/ses/api/users/resetpassword.php',JSON.stringify({"id" : id, "password" : ok}), function(res) {
							if(res.success) {
								swal({
									title: "success",
									text: "Password reset successfully \n You will be logged out after this message...",
									icon : "success"
								})
								.then(logout => {
									window.location.href="../app/http/logout.php";
								})
							}
						});
					}
				})
			}
		});
	});
	$(document).on('submit','#myaccountForm', function(e) {
		e.preventDefault();
		var status = '<?php if(isset($_SESSION["userData"])){
						echo $_SESSION["userData"]["status"];
					} ?>';
		var type = '<?php if(isset($_SESSION["userData"])){
						echo $_SESSION["userData"]["type"];
					}?>';
		if($(this).parsley().validate()) {
			$('.btnSaveMyaccount').buttonLoader('loading');
			var formData = $(this).serializeArray(),
				payload = {};
			formData.map((val,i) => {
				payload[val.name] = val.value;	
			});
			payload.status = status;
			payload.type = type;
			payload.id = '<?php if(isset($_SESSION["userData"])){
						echo $_SESSION["userData"]["id"];
					} ?>';
			$.post('/ses/api/users/update.php',JSON.stringify(payload), function(res) {
				$('.btnSaveMyaccount').buttonLoader('reset');
				if(res.success) {
					$('#myaccountForm').trigger("reset");
					$("#myaccountForm").parsley().reset();
					swal({
						title: "Success",
						text: "Account update successfully \n You need to logout to take effect the changes",
						icon: "success"
					})
					.then(ok => {
						window.location.reload();
					})
				} else {
					swal({
						title :"warning",
						text :res.message,
						icon : "warning"
					});
				}
			})
		}
	})

	$(document).on('click','.btnSaveMyaccount', function(){
		$("#myaccountForm").submit();
	})

	$(document).on('click','.btnChangePassword', function(){
		$("#changePassword").modal('show');
	})

	$(document).on('click','.btnProceedChangePassword', function(){

		$("#changePasswordForm").submit();
	});
	$(document).on("submit",'#changePasswordForm', function(e) {
		e.preventDefault();
		if($(this).parsley().validate()) {
			$(".btnProceedChangePassword").buttonLoader('loading');
			var formData = $(this).serializeArray();
			var payload = {}
			formData.map(val => {
				payload[val.name] = val.value;
			})
			$.post('/ses/api/users/changepassword.php',JSON.stringify(payload),function(res) {
				$(".btnProceedChangePassword").buttonLoader('reset');
				var result = JSON.parse(res);
				var msg = result.message;
				if(result.success) {
					swal({
						text: msg,
						icon:"success"
					})
					.then(ok => {
						window.location.reload();
					})
				} else {
					swal({
						text: msg,
						icon:"warning"
					})
				}
			})
		}
	})

	function generateRandomCharacter(){
		return '_' + Math.random().toString(36).substr(2, 9);
	}
	function hideResetPassword(){
	$(".btnResetpassword").hide();
	}
	function showResetPassword(){
		$(".btnResetpassword").show();
	}
	$(document).on('click','.btnResetpassword', function(){
	var username = $(this).attr('data-username');
	var id = $(this).attr('data-id');
	swal({
		title: "Confirmation",
		text: "Are you sure you want to reset "+username+" password?",
		icon: "warning",
		dangerMode:true,
		buttons: [
			"Cancel",
			{
				text: "reset",
				closeModal: false
			}
		]
		
	})
	.then(reset => {
		if(reset) {

			var password  = generateRandomCharacter();
			$.post('/ses/api/users/resetpassword.php',JSON.stringify({"id" : id, "password" : password}), function(res){
				if(res.success) {
					swal({
						text: "Username: "+username+"\nNew Password: "+password,
						icon: "success"
					})
				}
			})
		}
	});
});
$(document).on('click','button',function(){
	$('[data-toggle="tooltip"]').tooltip('hide');
})
$(document).on('click','a',function(){
	$('[data-toggle="tooltip"]').tooltip('hide');
})
</script>