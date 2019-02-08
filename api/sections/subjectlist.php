<?php
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/Section.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$section = new Section($db);
$data = json_decode(file_get_contents("php://input"));
$section->id = intval($data->id);
$sectionData = $section->sectionSubjectsList();

http_response_code(200);
echo json_encode([
	"success" => true,
	"message" => $sectionData
]);
