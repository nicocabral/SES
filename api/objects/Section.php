<?php 
class Section{
	// database connection and table name
    private $conn;
    private $table_name = "sections";
 
    // object properties
    public $id;
    public $name;
    public $year;
    public $subjects;
    public $status;
    public $studentId;
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
		            	name   = :name, 
		                year   = :year,
		                subjects = :subjects";
		
		    // prepare the query
		    $stmt = $this->conn->prepare($query);
		 	
		 
		    // bind the values
		    $stmt->bindParam(':name', $this->name);
		    $stmt->bindParam(':year', $this->year);
		    $stmt->bindParam(':subjects', $this->subjects);
		    return $stmt->execute();
	 		
	 	}
	 	
	}

	function update(){
	 	if($this->sanitize()) {
		    // if no posted password, do not update the password
		    $query = "UPDATE " . $this->table_name . "
		            SET
		            	name   = :name, 
		                year   = :year,
		                subjects = :subjects
		                WHERE id = :id";
		 	
		    // prepare the query
		    $stmt = $this->conn->prepare($query);
		
		    $stmt->bindParam(':name', $this->name);
		    $stmt->bindParam(':year', $this->year);
		    $stmt->bindParam(':subjects', $this->subjects);
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
	    if($stmt->execute()){
	       	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	    } else {
	    	return [];
	    }
	   
	}
	function sanitize(){
		$this->name  = htmlspecialchars(strip_tags($this->name));
	    $this->year = htmlspecialchars(strip_tags($this->year));
	    $this->subjects  = htmlspecialchars(strip_tags($this->subjects));
	    $this->status= htmlspecialchars(strip_tags($this->status));
		return true;
	}
	function checkDuplicateSection() {
		$query = "SELECT * FROM ".$this->table_name." 
				WHERE name = :name AND year = :year";
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	 	$stmt->bindParam(':name', $this->name);
	 	$stmt->bindParam(':year', $this->year);
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

	function subjectList(){
		$query = "SELECT subjects.code, subjects.name as subject_name,schedules.* FROM schedules
				LEFT JOIN subjects ON schedules.subject_id = subjects.id
		";
	    // prepare the query

	    $stmt = $this->conn->prepare($query);
	    if($stmt->execute()){
	       	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	    } else {
	    	return [];
	    }
	}
	function sectionSubjectsList(){
		$this->subjects = $this->read()["subjects"];
	
		$stmt = $this->conn->prepare("SELECT sections.id as section_id,schedules.*,subjects.code,subjects.name as subject_name 
									  FROM sections 
									  LEFT JOIN schedules ON FIND_IN_SET(schedules.id,sections.subjects) > 0
									  LEFT JOIN subjects ON sections.subject_id = subjects.id  WHERE sections.id = :id");
		$stmt->bindParam(':id', $this->id);
		if($stmt->execute()){
	       if($stmt->rowCount() > 0) {
	       	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
	       	return $row;
	       } 
	       return [];
	    }

	}

	function enroll(){
		$stmt = $this->conn->prepare("INSERT INTO enrollment SET
				student_id = :studentId,
				section_id = :id
			");
		$stmt->bindParam(':studentId', $this->studentId);
	 	$stmt->bindParam(':id', $this->id);
	 	if($stmt->execute()){
	      	$this->updateStudentStatus();
	       	return true;
	    }
	    return false;
	}
	function updateStudentStatus(){
		$stmt = $this->conn->prepare("UPDATE users SET
				status = 'Enrolled' WHERE id = :studentId
			");
		$stmt->bindParam(':studentId', $this->studentId);
	 	if($stmt->execute()){
	      
	       	return true;
	    }
	    return false;
	}
	function checkisEnroll(){
		$stmt = $this->conn->prepare("SELECT * FROM enrollment WHERE student_id = :studentId AND section_id = :id
			");
		$stmt->bindParam(':studentId', $this->studentId);
	 	$stmt->bindParam(':id', $this->id);
	 	if($stmt->execute()){
	       if($stmt->rowCount() > 0) {
	       	return true;
	       } 
	       return false;
	    }
	}

}