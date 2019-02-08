<?php 
require_once('../config/Middleware.php');
$middleware = new Middleware();
include_once '../config/Database.php';
include_once '../objects/Subject.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
// instantiate user object
$subject = new Subject($db);

echo json_encode([
	"success" => true,
	"message" => $subject->list()
]);
