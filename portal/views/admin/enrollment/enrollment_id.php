 <?php 

 if(isset($_GET["rollId"])) {
 	  $id = intval($_GET["rollId"]);
	  $sectionId = '';
	  $tr = '';
	  $conn = new mysqli("localhost", "root","", "ses");
	  if ($conn->connect_error) {
	      die("Connection failed: " . $conn->connect_error);
	  } 

	  $sql = "SELECT * FROM enrollment WHERE student_id = '".$id."'";
	  $result = $conn->query($sql);
	  if ($result->num_rows > 0) {
	      while($row = $result->fetch_assoc()) {
	          $sectionId = $row["section_id"];
	      }
	      echo $sectionId;
	  }
 }
 ?>