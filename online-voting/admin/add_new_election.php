<html>
    <head>
        <title>Online Voting System</title>
        <link rel="stylesheet" href="css/bootstrap.css" />
		 <link rel="stylesheet" href="mystyle.css" />
		 <script type="text/javascript" src="js/jquery.js"></script>
		 <script type="text/javascript" src="js/bootstrap.js"></script>
         
    </head>
	<body>
	<div class="container">
    <div class="col-sm-6">
	
	<h3>Add New Election</h3>
<form method="POSt">
    <div class="form-group">
        <label>Add Election Name</label>
        <input type="text" name="election_name" class="form-control">
    </div>
	<div class="form-group">
        <label>Election Start Date</label>
        <input type="date" name="election_start_date" class="form-control">
    </div>
	<div class="form-group">
        <label> Election End Date</label>
        <input type="date" name="election_end_date" class="form-control">
    </div>
	<input type="submit" name="add_election" class="btn btn-success">
</form
     
	 </div>
	 </div>
	 </body>
	</html>
	<?php
		$conn=new  mysqli("localhost","root","","online_voting");
		if(isset($_POST['add_election']))
		{
			
			$election_name=$_POST['election_name'];
			$election_start_date=$_POST['election_start_date'];
			$election_end_date=$_POST['election_end_date'];
			$insert="INSERT INTO election_tbl(election_name,election_start_date,election_end_date) values
			('$election_name','$election_start_date','$election_end_date')";
			$run=$conn->query($insert);
			if($run)
			{
				echo "Sucess";
				
			}
			else
			{
				
				echo "error";
			}
		}
	
	?>