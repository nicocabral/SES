<?php

class Student extends User {
    private $table_name = "users";
    // object properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $username;
    public $status;
    public $contactNumber;
    public $gender;
    public $address;
    public $metas;
    public $type;
    public $tokenData;
    public $con;
    public function __construct($db) {
         parent::__construct($db);
         $this->con = $db;
    }
    public function saveStudentMetas(){
        $metas = $this->metas;
        $keys = array_keys($metas);
        $this->con->beginTransaction();

        if(count($keys) > 0) {
            foreach($keys as $key => $val) {
                $this->con->exec("INSERT INTO student_metas (user_id, meta_key, meta_value) VALUES ('".intval($this->id)."', '".$val."', '".$metas[$val]."')");
            }
            $this->con->commit();
            return true;
        }
        return false;
    }

    public function deleteMetas(){
        $stmt = $this->con->prepare("DELETE FROM student_metas WHERE user_id = :user_id");
        $stmt->bindParam(":user_id",$this->id);
        return $stmt->execute() ? true : false; 
    }

    public function getMetas(){
        $stmt = $this->con->prepare("SELECT * FROM student_metas WHERE user_id = :user_id");
        $stmt->bindParam(":user_id",$this->id);
        if($stmt->execute()) {
           if($stmt->rowCount() > 0) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
           } 
           return false;
        }
    }

    public function updateMetas(){
        $delete = $this->deleteMetas();
        if($delete) {
            return $this->saveStudentMetas();
        } 
        return false;
    }
	public function enrollment() {
        $metas = [];
        $query = '';
        if($this->tokenData->type == 'student') {
            $query = "SELECT * FROM " . $this->table_name." WHERE type = 'student' AND id = '".$this->tokenData->id."'";
        } else {
            $query = "SELECT * FROM " . $this->table_name." WHERE type = 'student'";
        }
        
        $stmt = $this->con->prepare($query);
        if($stmt->execute()){
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows) > 0) {
                foreach($rows as $key => $value) {
                    $this->id = intval($value["id"]);
                    $metas = $this->getStudentMetas();
                    unset($rows[$key]["password"]);
                    $rows[$key]["metas"] = $metas;
                }
                return $rows;
            } 
            return $rows;
        } else {
            return [];
        }
    }
    public function getStudentMetas(){
        $query = "SELECT * FROM student_metas WHERE user_id = :user_id";
        $stmt = $this->con->prepare($query);
         $stmt->bindParam(':user_id', $this->id);
        if($stmt->execute()){
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
        return false;
    }

}