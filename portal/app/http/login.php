<?php 

session_start();
if(isset($_POST)) {
	$data_string = json_encode(["username" => $_POST["username"], "password" => $_POST["password"]]);    	      	                                                                                               
	$ch = curl_init('http://localhost/ses/api/login.php');                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	    'Content-Type: application/json',                                                                                
	    'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                   
	                                                                                                                     
	$result = json_decode(curl_exec($ch),true);

	if($result && $result["success"]) {
		$_SESSION['id']    = session_create_id();
		$_SESSION['token'] = $result["token"];
		$_SESSION['userData'] = json_decode(base64_decode(explode('.',$result["token"])[1]),true)["data"];
		$_SESSION['isLogin'] = true;
		$_SESSION['loginResult'] = $result;
		$_SESSION['token'] = $result["token"];
		return header("location: http://localhost/ses/portal/views");

	} else {

		$_SESSION['loginResult'] = $result;
		return header("location: http://localhost/ses/portal/views");
	}
}