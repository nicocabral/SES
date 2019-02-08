 <?php 

 if(isset($_GET["sectionId"])) {
 	  $id = intval($_GET["sectionId"]);
	  $sched = '';
	  $tr = '';
	  $conn = new mysqli("localhost", "root","", "ses");
	  if ($conn->connect_error) {
	      die("Connection failed: " . $conn->connect_error);
	  } 

	  $sql = "SELECT * FROM sections WHERE id = '".$id."'";
	  $result = $conn->query($sql);

	  if ($result->num_rows > 0) {
	      while($row = $result->fetch_assoc()) {
	          $sched = $row["subjects"];
	      }
	  }
	  $scheds = explode(',',$sched);
	  $res = $conn->query("SELECT subjects.*, schedules.subject_id, schedules.id FROM schedules LEFT JOIN subjects on schedules.subject_id = subjects.id WHERE schedules.id IN (".$sched.") GROUP BY schedules.subject_id");
	  if($res->num_rows > 0) {
	    while($rows = $res->fetch_assoc()) {
	      $tr.='<tr><td>'.$rows["code"]."</td><td>".$rows["name"]."</td><td><div class='row'><div class='col-sm-6'>Lecture<hr>";
	      $res = $conn->query("SELECT * FROM schedules WHERE id IN (".$sched.") AND lower(name) = 'lecture'");
	      if($res->num_rows > 0){
	        while($row = $res->fetch_assoc()) {
	          $tr.=$row["time_day"]." ".$row["time_hour"]." ".$row["time_min"]." ".$row["suffix"]."<br>";
	        }
	      }
	      $tr.="</div><div class='col-sm-6'>Lab<hr>";
	      $res = $conn->query("SELECT * FROM schedules WHERE id IN(".$sched.") AND lower(name) = 'lab'");
	      if($res->num_rows > 0) {
	      
	      	while($row = $res->fetch_assoc()) {
	      		$tr.=$row["time_day"]." ".$row["time_hour"]." ".$row["time_min"]." ".$row["suffix"]."<br>";
	      	}
	      }
	      $tr.="</div></div>";
	    }
	    $tr.="</td></tr>";
	  }
	  $conn->close();
	  echo $tr;
 }
 ?>