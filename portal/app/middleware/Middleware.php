<?php
class Middleware {
	public $location;
	public function __construct() {
		$this->location = 'http://localhost/ses/portal/views';

	}

	function verifySession(){
		
		if(!isset($_SESSION["isLogin"])) {
			return false;
		}
		return true;
	}

	function checkUserType($args){
		if($this->verifySession()) {
			if(!in_array($_SESSION["userData"]["type"],$args)){
				return header("location: ".$this->location);
			}
			return true;
		}
	}
}