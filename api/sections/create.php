<?php
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/Section.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$section = new Section($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
// use the create() method here
try {
	// set product property values
	$section->name     = $data->name;
	$section->year  = $data->year;
	$section->subjects = $data->subjects;
	if(!$section->checkDuplicateSection()) {
			if($section->create()) {
			    // set response code
			    http_response_code(200);
			 
			    // display message: user was created
			    echo json_encode([
			    	"success" => true,
			    	"message" => "Section was created.",
			    ]);
			} else {
				// set response code
			    http_response_code(200);
			 
			    // display message: user was created
			    echo json_encode([
			    	"success" => true,
			    	"message" => "Unable to create section.",
			    ]);
			}
		
	} else {
		echo json_encode([
			"success" => false,
			"message" => "Duplicate entry."
		]);
	}
} catch(Exception $e) {
	echo $e->getMessage();
}


