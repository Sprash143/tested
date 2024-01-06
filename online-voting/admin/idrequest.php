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
       <h2> All Requested Data</h2>
	   <table class="table table-responsive table-hover">
    <tr>
        <th>#</th>
            <th>User AddharCard</th>
            <th>User City</th>
			<th>Action</th>
        
    </tr>
	<?php
	$conn=new  mysqli("localhost","root","","online_voting");
	$select="select * from id_request_tbl";
	$run=$conn->query($select);
	if($run->num_rows>0)
	{
		$total=0;
		while($row=$run->fetch_array())
		{
			$total=$total+1;
		$id=$row['id'];
		
			?>
			
			
			<tr>
			<td><?php echo $total;?></td>
			<td><?php echo $row['user_email'];?></td>
			<td><?php echo $row['user_city'];?></td>
			<td><a href="updateid.php?id=<?php echo $id;?>">Update</a></td>
		<?php	
		}
	}
	else
	{
		?>
		<tr>
		<td colspan="4">Record not Found</td>
		<?php
	}
	?>
</table>
    </div>
	 <div class="col-sm-6">
	  </div>
</div>
	</head>
	</html>