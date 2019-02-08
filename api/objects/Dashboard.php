<?php
class Dashboard {
	// database connection and table name
    private $conn;
 	protected $table_name = 'users';
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    function dashboard(){
    	return [
    		"users" => $this->countUsers(),
    		"students" => $this->countStudents()
    	];
	    	
    }
    function countStudents(){
    	$query = "SELECT COUNT(*) as totalStudents FROM " . $this->table_name." WHERE type = 'student'";
	    $stmt = $this->conn->prepare($query);
	    if($stmt->execute()){
	        return $stmt->fetch(PDO::FETCH_ASSOC);
	    } else {
	    	return [];
	    }
    }

    function countUsers(){
    	$query = "SELECT COUNT(*) as totalUsers FROM " . $this->table_name." WHERE type = 'user'";
	    $stmt = $this->conn->prepare($query);
	    if($stmt->execute()){
	        return $stmt->fetch(PDO::FETCH_ASSOC);
	    } else {
	    	return [];
	    }
    }
    
	
}