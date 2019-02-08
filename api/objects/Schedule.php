<?php 
class Schedule{
	// database connection and table name
    private $conn;
    private $table_name = "schedules";
 
    // object properties
    public $id;
    public $name;
    public $timeDay;
    public $timeHour;
    public $timeMin;
    public $suffix;
    public $unit;
    public $status;
    public $subjectId;
    public $subjectUnit;
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
		                time_day = :timeDay,
		                time_hour = :timeHour,
		                time_min  = :timeMin,
		                suffix  = :suffix,
		                unit = :unit,
		                subject_id = :subjectId,
		                status   = :status";
		
		    // prepare the query
		    $stmt = $this->conn->prepare($query);
		 	
		 
		    // bind the values
		    $stmt->bindParam(':name', $this->name);
		    $stmt->bindParam(':timeDay', $this->timeDay);
		    $stmt->bindParam(':timeHour', $this->timeHour);
		    $stmt->bindParam(':timeMin', $this->timeMin);
		    $stmt->bindParam(':suffix', $this->suffix);
		    $stmt->bindParam(':unit', $this->unit);
		    $stmt->bindParam(':subjectId', $this->subjectId);
		    $stmt->bindParam(':status', $this->status);
		    return $stmt->execute();
	 		
	 		
	 	}
	 	
	}

	function checkUnit() {
		$query = "SELECT * FROM subjects WHERE id = :subjectId";
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	 	$stmt->bindParam(':subjectId', $this->subjectId);
	    // execute the query
	    if($stmt->execute()){
	       if($stmt->rowCount() > 0) {
	       	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	       	return intval($this->checkAllSchedUnit()["totalUnit"]) + intval($this->unit) > intval($row["unit"]);
	       } 
	       return null;
	    }
	 
	    return null;
	}

	function checkAllSchedUnit(){
		$query = "SELECT SUM(unit) as totalUnit FROM ".$this->table_name." WHERE subject_id = :subjectId AND name= :name AND time_day = :timeDay";
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	 	$stmt->bindParam(':subjectId', $this->subjectId);
	 	$stmt->bindParam(':name', $this->name);
	 	$stmt->bindParam(':timeDay', $this->timeDay);
	    // execute the query
	    if($stmt->execute()){
	       if($stmt->rowCount() > 0) {
	       	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	       	return $row["totalUnit"] == null ? 0 : $row;
	       } 
	       return false;
	    }
	 
	    return false;
	}
	function update(){
	 	if($this->sanitize()) {
		    // if no posted password, do not update the password
		    $query = "UPDATE " . $this->table_name . "
		            SET
		            	name   = :name, 
		                time_day = :timeDay,
		                time_hour = :timeHour,
		                time_min  = :timeMin,
		                suffix  = :suffix,
		                unit = :unit,
		                status   = :status
		                WHERE id = :id";
		 	
		    // prepare the query
		    $stmt = $this->conn->prepare($query);
		
		    $stmt->bindParam(':name', $this->name);
		    $stmt->bindParam(':timeDay', $this->timeDay);
		    $stmt->bindParam(':timeHour', $this->timeHour);
		    $stmt->bindParam(':timeMin', $this->timeMin);
		    $stmt->bindParam(':suffix', $this->suffix);
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

		$query = "SELECT * FROM ".$this->table_name." WHERE subject_id = :subjectId";
	    // prepare the query

	    $stmt = $this->conn->prepare($query);
	    $stmt->bindParam(':subjectId', $this->subjectId);
	    if($stmt->execute()){
	       	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	    } else {
	    	return false;
	    }
	   
	}
	function sanitize(){
		$this->name  = htmlspecialchars(strip_tags($this->name));
	    $this->timeDay = htmlspecialchars(strip_tags($this->timeDay));
	    $this->timeHour  = htmlspecialchars(strip_tags($this->timeHour));
	    $this->timeMin  = htmlspecialchars(strip_tags($this->timeMin));
	    $this->suffix  = htmlspecialchars(strip_tags($this->suffix));
	    $this->unit  =   htmlspecialchars(strip_tags($this->unit));
	    $this->subjectId = htmlspecialchars(strip_tags($this->subjectId));
	    $this->status= htmlspecialchars(strip_tags($this->status));
		return true;
	}
	function checkDuplicateSchedules() {
		$query = "SELECT * FROM ".$this->table_name." 
				WHERE name = :name AND subject_id = :subjectId AND time_day = :timeDay AND time_hour = :timeHour AND time_min = :timeMin AND suffix = :suffix";
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	 	$stmt->bindParam(':name', $this->name);
	 	$stmt->bindParam(':subjectId', $this->subjectId);
	 	$stmt->bindParam(':timeDay', $this->timeDay);
	 	$stmt->bindParam(':timeHour', $this->timeHour);
	 	$stmt->bindParam(':timeMin', $this->timeMin);
	 	$stmt->bindParam(':suffix', $this->suffix);
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