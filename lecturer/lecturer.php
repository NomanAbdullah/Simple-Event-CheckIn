<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Noman Abdullah">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>I N I T 5 Check In | 2k19</title>
	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</head>
<body class="bg-secondary">
	 <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  		<a class="navbar-brand" href="../index.php">I N I T 5</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="collapsibleNavbar">
    		<ul class="navbar-nav">
      			<li class="nav-item"><a class="nav-link" href="../index.php">Undergrad</a>
      			</li>
      			<li class="nav-item"><a class="nav-link" href="../alumni/alumni.php">Alumni</a>
      			</li>
      			<li class="nav-item"><a class="nav-link" href="lecturer/lecturer.php">Lecturer</a>
      			</li>
    		</ul>
  		</div>
	</nav> 
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-10 bg-light mt-2 rounded pb-3">
				<h1 align="center" class="text-primary p-2"><strong>I N I T 5 Check In | Lecturer</strong>
				</h1>
				<hr>
				<div class="form-inline">
					<label for="Search" class="front-weight-bold lead text-dark">Search Record</label>&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="search" id="search_text" class="form-control form-control-1g rounded-0 border-primary" placeholder="Enter Lecturer Name">
				</div>
				<hr>
				<?php 
					include 'config.php';
					$stmt=$conn->prepare("SELECT * FROM tbl_lecturer");
					$stmt->execute();
					$result=$stmt->get_result();

				?>
				<table class="table table-hover table-light table-striped" id="table-data">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Check In</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row=$result->fetch_assoc()){ ?>
							<?php 
								$ID = $row['ID'];
								$Status = $row['CheckIn']; 
							?>
							<tr>
								<td><?= $row['ID']; ?></td>
								<td><?= $row['Name']; ?></td>
								<td>
									<a href="setLecturerStatus.php?id=<?php echo $ID; ?>">
										<?php if($Status == "Yes"){ ?>
										<button type="button" class="btn btn-success" id="status">Yes</button></a>
										<?php }else { ?> 										
										<button type="button" class="btn btn-danger" id="status">No</button></a>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		//Live Search
		$(document).ready(function() {
			$("#search_text").keyup(function(){
				var search = $(this).val();
				$.ajax({
					url:'action_l.php',
					method:'post',
					data:{query:search},
					success:function(response){
						$("#table-data").html(response);
					}
				});
			});
		});

		//Status
		$(document).ready(function() {
			$("#status").onSubmit(function(){
				var status = $("#status");
				$.ajax({
					url:'action_l.php',
					method:'post',
					data:{status:status},
					success:function(response){
						$("#table-data").html(response);
					}
				});
			});
		});

	</script>
</body>
</html>