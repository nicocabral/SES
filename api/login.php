<?php
include_once 'config/headers.php';
// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/user.php';
include_once 'JWT.php';
use \Firebase\JWT\JWT;
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate user object
$user = new User($db);
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$user->username = $data->username;
$userExist = $user->checkUsernameIfExist();

// check if user exists and if password is correct
if($userExist && password_verify($data->password, $user->password)){
 
    $token = array(
       "iss" => $iss,
       "aud" => $aud,
       "iat" => $iat,
       "nbf" => $nbf,
       "data" => array(
           "id" => $user->id,
           "firstname" => $user->firstname,
           "lastname" => $user->lastname,
           "email" => $user->email,
           "username" => $user->username,
           "contactNumber" => $user->contactNumber,
           "status" => $user->status,
           "type"  => $user->type
       )
    );
 
    // set response code
    http_response_code(200);
 
    // generate jwt
    $jwt = JWT::encode($token, $key);
    echo json_encode(
            array(
            	"success" => true,
                "message" => "Successful login.",
                "token" => $jwt
            )
        );
 
} else {
 
    // set response code
    http_response_code(401);
 
    // tell the user login failed
    echo json_encode(array("success" => false, "message" => "Login failed."));
}