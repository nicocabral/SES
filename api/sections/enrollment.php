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
	
	$section->id  = $data->sectionId;
	$section->studentId = $data->studentId;
	if(!$section->checkisEnroll()) {
		if($section->enroll()) {
		    // set response code
		    http_response_code(200);
		 
		    // display message: user was created
		    echo json_encode([
		    	"success" => true,
		    	"message" => "Enroll successfully.",
		    ]);
		} else {
			// set response code
		    http_response_code(200);
		 
		    // display message: user was created
		    echo json_encode([
		    	"success" => false,
		    	"message" => "Unable to enroll.",
		    ]);
		}
	} else {
		// set response code
	    http_response_code(200);
	 
	    // display message: user was created
	    echo json_encode([
	    	"success" => false,
	    	"message" => "Already enrolled.",
	    ]);
	}
		
	
} catch(Exception $e) {
	echo $e->getMessage();
}


