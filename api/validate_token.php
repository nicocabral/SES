<?php 
include_once 'config/headers.php';
include_once 'JWT.php';


// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// get jwt
$jwt= isset($data->jwt) ? $data->jwt : "";
 
// decode jwt here
// if jwt is not empty
if($jwt){
 
    // if decode succeed, show user details
    try {
        // decode jwt
        $decoded = JWT::decode($jwt, $key, array('HS256'));
 
        // set response code
        http_response_code(200);
 
        // show user details
        echo json_encode(array(
        	"authorized" => true,
            "message" => "Access granted.",
            "data" => $decoded->data
        ));
 
    } catch (Exception $e){
 
	    // set response code
	    http_response_code(401);
	 
	    // tell the user access denied  & show error message
	    echo json_encode(array(
	        "message" => "Access denied.",
	        "error" => $e->getMessage()
	    ));
	}
 
   
} else{
 
    // set response code
    http_response_code(401);
 
    // tell the user access denied
    echo json_encode(array("success" => false,"message" => "Access denied."));
}
  
 
