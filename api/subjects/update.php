<?php 
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/Subject.php';



// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate user object
$subject = new Subject($db);
// get posted data
$data = json_decode(file_get_contents("php://input"));


    // if decode succeed, show user details
    try {
 
 		// set user property values
		$subject->code = $data->code;
		$subject->name = $data->name;
		$subject->description = $data->description;
		$subject->unit = $data->unit;
		$subject->status = $data->status;
		$subject->id   = $data->id;
	;

		// update the product
		if($subject->update()){
		    http_response_code(200);
		    echo json_encode(array("success" => true,"message" => "Updated successfully.", "data" => $data));
		} else {
		    // set response code
		    http_response_code(200);
		 
		    // show error message
		    echo json_encode(array("success" => false,"message" => "Unable to update subject."));
		}
        // set user property values here
    } catch (Exception $e){
 
	    // set response code
	    http_response_code(200);
	 
	    // show error message
	    echo json_encode(array(
	    	"succes" => false,
	        "error" => $e->getMessage()
	    ));
	}
 