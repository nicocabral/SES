<?php
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/Schedule.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$schedule = new Schedule($db);
$schedule->subjectId = intval($_GET['subjectId']);
$scheduleData = $schedule->list();
if($scheduleData) {
	http_response_code(200);
	echo json_encode([
		"success" => true,
		"message" => $scheduleData
	]);
} else {
	http_response_code(200);
	echo json_encode([
		"success" => false,
		"message" => "Schedule not found"
	]);
}