<?php  
	include 'config.php';

		if(isset($_GET["id"])){

	        $ID = $_GET["id"];
	        $stmt=$conn->prepare("UPDATE tbl_lecturer SET CheckIn='Yes' WHERE ID='$ID'");
	        $stmt->execute();


	        if(isset($stmt)){        
	            header('Location:lecturer.php');
	        }else{
	            echo "There is an Error";
        	}
    	}

?>