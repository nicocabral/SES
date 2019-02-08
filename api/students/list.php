<?php 
require_once('../config/Middleware.php');
$middleware = new Middleware();
include_once '../config/Database.php';
include_once '../objects/User.php';
include_once '../objects/Student.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate user object
$student = new Student($db);
$data = $_GET;
$student->tokenData = $middleware->decoded->data;

$dataItems = $student->enrollment();
try {
	echo  json_encode([
		"success" => true,
		"message" => '',
		"items" => $dataItems
	]);
} catch(Exception $e) {
	echo  json_encode([
		"success" => false,
		"message" => $e->getMessage()
	]);
}