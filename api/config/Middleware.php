<?php 
require_once('headers.php');
require_once('core.php');
require_once('../libs/php-jwt-master/src/BeforeValidException.php');
require_once('../libs/php-jwt-master/src/ExpiredException.php');
require_once('../libs/php-jwt-master/src/SignatureInvalidException.php');
require_once('../libs/php-jwt-master/src/JWT.php');
use \Firebase\JWT\JWT;
class Middleware {
	public $headers;
	public $jwt;
	public $decoded;
	public $key = 'nico.cabral';
	public $tokenId;
	public function __construct(){
		$this->headers = apache_request_headers();
		$this->jwt = isset($this->headers["Authorization"]) ? $this->headers["Authorization"] : "";
		// get jwt
		$this->verifyRequest();

	}
	function verifyRequest(){
		
		if($this->jwt) {
			try {
				
				$this->decoded = JWT::decode($this->jwt, $this->key, array('HS256'));
			}catch (Exception $e){
				// set response code
			    http_response_code(401);
			 
			    // show error message
			    die(json_encode(array(
			    	"succes" => false,
			        "message" => "Access denied.",
			        "error" => $e->getMessage()
			    )));
			}
		} else {
			http_response_code(401);
			die(json_encode([
				"success" => false,
				"message" => "Missing authorization token."
			]));
		}
	}
}