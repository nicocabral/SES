<?php 
class Database {
	// specify your own database credentials
    private $host = "localhost";
    private $db_name = "ses";
    private $username = "root";
    private $password = "";
    public $conn;
 	

 	public function __contruct() {
 		$this->getConnection();
 	}
    // get the database connection
    public function getConnection(){
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }



}