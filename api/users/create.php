<?php
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/User.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$user = new User($db);

// get posted data
 $data = json_decode(file_get_contents("php://input"));
// $data = json_decode(json_encode($_POST));

// use the create() method here
try {
	// set product property values
	$user->firstname = $data->firstname;
	$user->lastname  = $data->lastname;
	$user->email     = $data->email;
	$user->username  = $data->username;
	$user->status    = $data->status;
	$user->contactNumber = $data->contactNumber;
	$user->type      = $data->type;
	if(!$user->checkUsernameIfExist()) {

		if($user->create()){
		 
		    // set response code
		    http_response_code(200);
		 
		    // display message: user was created
		    echo json_encode([
		    	"success" => true,
		    	"message" => "User was created.",
		    	"user_credentials" => [
		    		"username" => $user->username,
		    		"password" => $user->password
		    	]
		    ]);
		} else {
		 
		    // set response code
		    http_response_code(400);
		 
		    // display message: unable to create user
		    echo json_encode([
		    	"success" => false,
		    	"message" => "Unable to create user."
		    ]);
		}
	} else {
		echo json_encode([
			"success" => false,
			"message" => "User already exist."
		]);
	}
} catch(Exception $e) {
	echo $e->getMessage();
}


