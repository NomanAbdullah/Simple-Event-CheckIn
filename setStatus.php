<?php  
	include 'config.php';

		if(isset($_GET["id"])){

	        $RegNo = $_GET["id"];
	        $stmt=$conn->prepare("UPDATE tbl_undergrad SET CheckIn='Yes' WHERE RegNo='$RegNo'");
	        $stmt->execute();


	        if(isset($stmt)){        
	            header('Location:index.php');
	        }else{
	            echo "There is an Error";
        	}
    	}

?>