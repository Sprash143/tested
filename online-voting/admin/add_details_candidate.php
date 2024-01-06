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
	
	<h3>Add Candidates</h3>
<form method="POST">
    <?php
	$conn =new  mysqli("localhost","root","","online_voting");
	$election_name=$_GET['election_name'];
	$total_candidates=$_GET['total_candidates'];
	?>
	<label>Election Name </label>
	<input type="text" name="election_name" value="<?php echo $election_name;?>" class="form-control"
	readonly="readonly">
	<?php
	for($i=1;$i<=$total_candidates;$i++)
	{
	?>
	<div classs="form-group">
	<label>Candidates Name <?php echo $i;?></label>
	<input type="text" name="candidates_name<?php echo $i;?>" class="form-control">
	</div>
	<br>
	<?php
	}
	?>
	<input type="submit" name="add_detail_candidates" class="btn btn-success">
</form>
	 </div>
	 </div>
	 </body>
	</html>
	
	<?php
	if(isset($_POST['add_detail_candidates']))
	{
		$total_candidates=$_GET['total_candidates'];
		$election_name=$_POST['election_name'];
		for($i=1;$i<=$total_candidates;$i++)
		{
			
			$candidates_name[]=$_POST['candidates_name'.$i];
			
		}
		for($i=0;$i<$total_candidates;$i++)
		{
			
			$insert="insert into candidates_tbl (candidates_name,election_name) 
			values('$candidates_name[$i]','$election_name')";
			$run=$conn->query($insert);
		}
		if($run)
		{
			
			echo "success";
		}
			else
			{
				
				echo "Error";
			}
		}
	
	?>