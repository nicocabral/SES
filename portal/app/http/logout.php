<?php 
session_start();
session_destroy();
$_SESSION = array();

header("location: http://localhost/ses/portal/views");