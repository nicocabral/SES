<?php
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/Subject.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$subject = new Subject($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// use the create() method here
try {
	// set product property values
	$subject->code      = $data->code;
	$subject->name      = $data->name;
	$subject->description= $data->description;
	$subject->unit      = $data->unit;
	$subject->status    = $data->status;

	if(!$subject->getSubject()) {

		if($subject->create()){
		 
		    // set response code
		    http_response_code(200);
		 
		    // display message: user was created
		    echo json_encode([
		    	"success" => true,
		    	"message" => "Subject was created.",
		    ]);
		} else {
		 
		    // set response code
		    http_response_code(400);
		 
		    // display message: unable to create user
		    echo json_encode([
		    	"success" => false,
		    	"message" => "Unable to create subject."
		    ]);
		}
	} else {
		echo json_encode([
			"success" => false,
			"message" => "Subject already exist."
		]);
	}
} catch(Exception $e) {
	echo $e->getMessage();
}


