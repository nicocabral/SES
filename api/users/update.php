<?php 
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/User.php';



// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate user object
$user = new User($db);
// get posted data
$data = json_decode(file_get_contents("php://input"));


    // if decode succeed, show user details
    try {
 
 		// set user property values
		$user->firstname = $data->firstname;
		$user->lastname = $data->lastname;
		$user->email = $data->email;
		$user->id = $data->id;
		$user->username = $data->username;
		$user->contactNumber = $data->contactNumber;
		$user->status = $data->status;
		$user->type   = $data->type;

		// update the product
		if($user->update()){
		    http_response_code(200);
		    echo json_encode(array("success" => true,"message" => "Updated successfully.", "data" => $data));
		} else {
		    // set response code
		    http_response_code(200);
		 
		    // show error message
		    echo json_encode(array("success" => false,"message" => "Unable to update user."));
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
 