<?php  
	$conn=new mysqli("localhost","root","","init5");
	if ($conn->connect_error){
		die("Connect Failed".$conn->connect_error);
	}
?>