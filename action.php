<?php  
	include 'config.php';
	$output='';

	if(isset($_POST['status'])){
		$RegNo = $_POST['RegNo'];
		$stmt=$conn->prepare("UPDATE tbl_undergrad SET CheckIn='Yes' WHERE RegNo=?");
		$stmt->bind_param("s",$RegNo);		
		$result = $stmt->execute() or die ($this->con->error);
        if($result){
            return "DONE";
        }else{
            return 0;
        }
	}

	if (isset($_POST['query'])) {
		$search=$_POST['query'];
		$stmt=$conn->prepare("SELECT * FROM tbl_undergrad WHERE RegNo=? OR Contact=?");
		$stmt->bind_param("is",$search,$search);
	}
	else {
		$stmt=$conn->prepare("SELECT * FROM tbl_undergrad");
	}
	$stmt->execute();
	$result=$stmt->get_result();

	if($result->num_rows>0){
		$output ="<thead>
					<tr>
						<th>RegNo</th>
						<th>Name</th>
						<th>Contact</th>
						<th>Batch</th>
						<th>Check In</th>
					</tr>
				 </thead>
				 <tbody>";
				while($row=$result->fetch_assoc()) {

					
								$RegNo = $row['RegNo']; 
								$Status = $row['CheckIn']; 
							
					$output.="
					<tr>
						<td>".$row['RegNo']."</td>
						<td>".$row['Name']."</td>
						<td>".$row['Contact']."</td>
						<td>".$row['Batch']."</td>
						<td>"
							."<a href=setStatus.php?id=".$RegNo.">";
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