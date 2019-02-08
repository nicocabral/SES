<?php

class User{
	// database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $username;
    public $status;
    public $gender;
    public $address;
    public $contactNumber;
    public $type;
    public $tokenData;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

   // create new user record
	public function create(){
	 	if($this->sanitize()) {
		    // insert query
		    $query = "INSERT INTO " . $this->table_name . "
		            SET
		            	username   = :username, 
		                first_name = :firstname,
		                last_name  = :lastname,
		                email      = :email,
		                password   = :password,
		                status     = :status,
		                contact_number = :contactNumber,
		                type 	   = :type,
		                gender     = :gender,
		                address    = :address,
		                created_at = now()";
		 
		    // prepare the query
		    $stmt = $this->conn->prepare($query);
		 	
		 
		    // bind the values
		    $stmt->bindParam(':username', $this->username);
		    $stmt->bindParam(':firstname', $this->firstname);
		    $stmt->bindParam(':lastname', $this->lastname);
		    $stmt->bindParam(':email', $this->email);
		    $stmt->bindParam(':status', $this->status);
		 	$stmt->bindParam(':contactNumber', $this->contactNumber);
		 	$stmt->bindParam(':type', $this->type);
		 	$stmt->bindParam(':gender', $this->gender);
		 	$stmt->bindParam(':address', $this->address);
		    // hash the password before saving to database
		    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
		    $stmt->bindParam(':password', $password_hash);
		
		    // execute the query, also check if query was successful
		    if($stmt->execute()){
		        return $this->conn->lastInsertId();
		    }
		    return false;
	 	}
	 	
	}
	public function update(){
	 	if($this->sanitize()) {
		    // if no posted password, do not update the password
		    $query = "UPDATE " . $this->table_name . "
		            SET
		            	username  = :username,
		                first_name = :firstname,
		                last_name  = :lastname,
		                email     = :email,
		                contact_number = :contactNumber,
		                status    = :status,
		                updated_at = now(),
		                type     = :type
		            	WHERE id = :id";
		 	
		    // prepare the query
		    $stmt = $this->conn->prepare($query);
		 
		    // bind the values from the form
		    $stmt->bindParam(':firstname', $this->firstname);
		    $stmt->bindParam(':lastname', $this->lastname);
		    $stmt->bindParam(':email', $this->email);
		 	$stmt->bindParam(':status', $this->status);
		 	$stmt->bindParam(':username', $this->username);
		 	$stmt->bindParam(':contactNumber', $this->contactNumber);
		 	$stmt->bindParam(':type', $this->type);
		    $stmt->bindParam(':id', $this->id);
		 
		    // execute the query
		    if($stmt->execute()){
		        return true;
		    }
		 
		    return false;
	 	}
	}

	public function read(){
		$query = "SELECT * FROM ".$this->table_name." WHERE id = :id";
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	 	$stmt->bindParam(':id', $this->id);
	    // execute the query
	    
	    if($stmt->execute()){
	       if($stmt->rowCount() > 0) {
	       	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	       	return $row;
	       } 
	       return false;
	    }
	 
	    return false;
	}

	public function delete(){
		$query = "DELETE FROM ".$this->table_name." WHERE id = :id";
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	 	$stmt->bindParam(':id', $this->id);
	    // execute the query
	  
	     return $stmt->execute();
	   
	}

	public function list($args){
		
		$query = "SELECT * FROM ".$this->table_name. ' WHERE type = :type AND id != :id';

	    // prepare the query

	    $stmt = $this->conn->prepare($query);
	    $stmt->bindParam(':type', $args["type"]);
	    $stmt->bindParam(':id', $this->tokenData->id);
	    // execute the query

	    if($stmt->execute()){
	       	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	    } else {
	    	return false;
	    }
	   
	}
	public function password($args = null){
		$this->password = $args ? $args : uniqid(mt_rand());

	    return substr(base_convert(sha1($this->password), 16, 36), 0, 8);
	}
	public function sanitize(){
		$this->username  = htmlspecialchars(strip_tags($this->username));
	    $this->firstname = htmlspecialchars(strip_tags($this->firstname));
	    $this->lastname  = htmlspecialchars(strip_tags($this->lastname));
	    $this->email     = htmlspecialchars(strip_tags($this->email));
	    $this->password  = $this->password();
	    $this->status    = htmlspecialchars(strip_tags($this->status));
	    $this->contactNumber = htmlspecialchars(strip_tags($this->contactNumber));
		$this->type = htmlspecialchars(strip_tags($this->type));
		return true;
	}
	public function resetPassword(){
		// if no posted password, do not update the password
	    $query = "UPDATE " . $this->table_name . "
	            SET
	            	password = :password
	            	WHERE id = :id";
	 	
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	    $password_hash =  password_hash($this->password, PASSWORD_BCRYPT);
	 	$stmt->bindParam(':password',$password_hash);
	    $stmt->bindParam(':id', $this->id);
	 
	    // execute the query
	    if($stmt->execute()){
	        return true;
	    }
	 
	    return false;
	}
	public function checkUsernameIfExist() {
		$query = "SELECT * FROM ".$this->table_name." WHERE username = :username";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $this->username);
		if($stmt->execute()){
			
	        if($stmt->rowCount() > 0) {
	        	// get record details / values
		        $row = $stmt->fetch(PDO::FETCH_ASSOC);
		 	
		        // assign values to object properties
		        $this->id = $row['id'];
		        $this->firstname = $row['first_name'];
		        $this->lastname = $row['last_name'];
		        $this->username = $row['username'];
		        $this->status = $row['status'];
		        $this->password = $row['password'];
		        $this->email = $row['email'];
		        $this->contactNumber = $row["contact_number"];
		        $this->type = $row["type"];

		        return true;
	        }
	        return false;
			
	    }
	}
	

	
}