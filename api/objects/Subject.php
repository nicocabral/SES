<?php 
class Subject{
	// database connection and table name
    private $conn;
    private $table_name = "subjects";
 
    // object properties
    public $id;
    public $code;
    public $name;
    public $description;
    public $unit;
    public $status;
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    // create new user record
	function create(){
	 	if($this->sanitize()) {
		    // insert query
		    $query = "INSERT INTO " . $this->table_name . "
		            SET
		            	code   = :code, 
		                name   = :name,
		                description  = :description,
		                unit   = :unit,
		                status = :status,
		                created_at = now()";
		 
		    // prepare the query
		    $stmt = $this->conn->prepare($query);
		 	
		 
		    // bind the values
		    $stmt->bindParam(':code', $this->code);
		    $stmt->bindParam(':name', $this->name);
		    $stmt->bindParam(':description', $this->description);
		    $stmt->bindParam(':unit', $this->unit);
		    $stmt->bindParam(':status', $this->status);
		
		    // execute the query, also check if query was successful
		    if($stmt->execute()){
		        return true;
		    }
		    return false;
	 	}
	 	
	}
	function update(){
	 	if($this->sanitize()) {
		    // if no posted password, do not update the password
		    $query = "UPDATE " . $this->table_name . "
		            SET
		            	code   = :code, 
		                name   = :name,
		                description  = :description,
		                unit   = :unit,
		                status = :status,
		                updated_at = now()
		            	WHERE id = :id";
		 	
		    // prepare the query
		    $stmt = $this->conn->prepare($query);
		 
		    // bind the values
		    $stmt->bindParam(':code', $this->code);
		    $stmt->bindParam(':name', $this->name);
		    $stmt->bindParam(':description', $this->description);
		    $stmt->bindParam(':unit', $this->unit);
		    $stmt->bindParam(':status', $this->status);
		    $stmt->bindParam(':id', $this->id);
		 
		    // execute the query
		    if($stmt->execute()){
		        return true;
		    }
		 
		    return false;
	 	}
	}

	function read(){
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

	function delete(){
		$query = "DELETE FROM ".$this->table_name." WHERE id = :id";
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	 	$stmt->bindParam(':id', $this->id);
	    // execute the query
	  
	     return $stmt->execute();
	   
	}

	function list(){

		$query = "SELECT * FROM ".$this->table_name;
	    // prepare the query

	    $stmt = $this->conn->prepare($query);
	    // execute the query

	    if($stmt->execute()){
	       	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	    } else {
	    	return false;
	    }
	   
	}
	function sanitize(){
		$this->code  = htmlspecialchars(strip_tags($this->code));
	    $this->name  = htmlspecialchars(strip_tags($this->name));
	    $this->description  = htmlspecialchars(strip_tags($this->description));
	    $this->unit  = htmlspecialchars(strip_tags($this->unit));
	    $this->status= htmlspecialchars(strip_tags($this->status));
		return true;
	}
	function getSubject(){
		$query = "SELECT * FROM ".$this->table_name." WHERE code = :code";
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	 	$stmt->bindParam(':code', $this->code);
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

}