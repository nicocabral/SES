<?php 

include_once '../config/Database.php';
include_once '../objects/User.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate user object
$user = new User($db);
$data = json_decode(file_get_contents("php://input"));
$user->username = $data->cusername;
try{
	if($user->checkUsernameIfExist()){
		if(password_verify($data->cpassword, $user->password)) {
			$user->password = $data->cnewpassword;
			if($user->resetPassword()) {
				http_response_code(200);
				echo json_encode([
					"success" => true,
					"message" => "Password change successfully."
				]);
			}
		} else {
			http_response_code(200);
			echo json_encode([
				"success" => false,
				"message" => "Current password does not match."
			]);
		}
	} else {
		http_response_code(200);
		echo json_encode([
			"success" => false,
			"message" => "Username or student id does not exist."
		]);
	}

}catch(Exception $e) {
	http_response_code(200);
	echo  json_encode([
		"success" => false,
		"message" => $e->getMessage()
	]);	
}
