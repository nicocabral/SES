<?php
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/Schedule.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$schedule = new Schedule($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
// use the create() method here
try {
	// set product property values
	$schedule->name     = $data->name;
	$schedule->timeDay  = $data->timeDay;
	$schedule->timeHour = $data->timeHour;
	$schedule->timeMin  = $data->timeMin;
	$schedule->suffix   = $data->suffix;
	$schedule->subjectId = $data->subjectId;
	$schedule->unit     = $data->unit;
	$schedule->status   = $data->status;
	if(!$schedule->checkDuplicateSchedules()) {
		if(!$schedule->checkUnit()) {
			if($schedule->create()){
			 
			    // set response code
			    http_response_code(200);
			 
			    // display message: user was created
			    echo json_encode([
			    	"success" => true,
			    	"message" => "Schedule was created.",
			    ]);
			} else {
			 
			    // set response code
			    http_response_code(400);
			 
			    // display message: unable to create user
			    echo json_encode([
			    	"success" => false,
			    	"message" => "Unable to create schedule"
			    ]);
			}
		} else {
			// set response code
		    http_response_code(400);
		 
		    // display message: unable to create user
		    echo json_encode([
		    	"success" => false,
		    	"message" => "Schedule exceeds in subject total units",
		    	"result" =>$schedule->checkUnit()
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


