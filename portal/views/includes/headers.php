<?php 
session_start();
?>
<head>
	<title>ACLC Enrollment System</title>
	<meta name="token" content="<?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? $_SESSION['token'] : ''; ?>">
	<link rel="shortcut icon" href="../assets/img/logo.png" />
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="../assets/datatable/css/dataTables.bootstrap4.min.css">
	 <!-- Include SmartWizard CSS -->
    <link href="../assets/css/wizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />

    <!-- Optional SmartWizard theme -->
    <link href="../assets/css/wizard/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/wizard/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/wizard/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../assets/css/custom.css">
</head>

