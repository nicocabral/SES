<?php 
require_once('../config/Middleware.php');
$middleware = new Middleware();
include_once '../config/Database.php';
include_once '../objects/Dashboard.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
// instantiate user object
$subject = new Dashboard($db);

echo json_encode([
	"success" => true,
	"message" => "",
	"items" => $subject->dashboard()
]);
