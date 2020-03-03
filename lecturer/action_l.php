<?php  
	include 'config.php';
	$output='';

	if(isset($_POST['status'])){
		$RegNo = $_POST['ID'];
		$stmt=$conn->prepare("UPDATE tbl_lecturer SET CheckIn='Yes' WHERE ID=?");
		$stmt->bind_param("s",$ID);		
		$result = $stmt->execute() or die ($this->con->error);
        if($result){
            return "DONE";
        }else{
            return 0;
        }
	}

	if (isset($_POST['query'])) {
		$search=$_POST['query'];
		$stmt=$conn->prepare("SELECT * FROM tbl_lecturer WHERE Name LIKE CONCAT('%',?,'%')");
		$stmt->bind_param("s",$search);
	}
	else {
		$stmt=$conn->prepare("SELECT * FROM tbl_lecturer");
	}
	$stmt->execute();
	$result=$stmt->get_result();

	if($result->num_rows>0){
		$output ="<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Check In</th>
					</tr>
				 </thead>
				 <tbody>";
				while($row=$result->fetch_assoc()) {

					
								$ID = $row['ID']; 
								$Status = $row['CheckIn']; 
							
					$output.="
					<tr>
						<td>".$row['ID']."</td>
						<td>".$row['Name']."</td>
						<td>"
							."<a href=setLecturerStatus.php?id=".$ID.">";
										if($Status == "Yes"){ 
											$output.="<button type=\""."button\""." class=\""."btn btn-success\""." id=\""."status\"".">Yes</button></a>";
										}else {  										
											$output.="<button type=\""."button\"". "class=\""."btn btn-danger\""." id=\""."status\"".">No</button></a>";
										}
										
						$output.="</td>
					</tr>";
				}
				$output .="</tbody>";
				echo $output;
			}
			else {
				echo "<h3>No Records Found</h3>";
			}

?>