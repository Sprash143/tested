<?php
session_start();
include("includes/about.php");
if(!$_SESSION['user_id_generated'])
{
	
	echo"<script>window.location.href='election.php'</script>";
}
?>
<br>
<div class="conatiner">
<div class="col-md-6 col-md-offset-3">
<form method="post">
<label> Elections name:</label>
<select class="form-control" name="election_name">
<option value="" selected="selected">Select Election</option>
<?php

require("includes/conn.php");
$select="select * from election_tbl";
$run=$conn->query($select);
if($run->num_rows>0)
{

while($row=$run->fetch_array())
{
	

?>
<option value="<?php echo $row['election_name'];?>"><?php echo $row['election_name'];?></option>
<?php


}

}
?>



</select>
<br>
<input type="submit" name="search_candidate" class="btn btn-success" value="Search Candidate">
</form>
</div>
</div>
<?php  

date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['search_candidate']))
{
	$election_name=$_POST['election_name'];
	$select="select * from election_tbl where election_name='$election_name'";
	$run=$conn->query($select);
	if($run->num_rows>0)
	{
		
	while($row=$run->fetch_array())
	{
		$election_start_date=$row['election_start_date'];
		$election_end_date=$row['election_end_date'];
}

}
$current_ts=time();
$election_start_date_ts=strtotime($election_start_date);
$election_end_date_ts=strtotime($election_end_date);
if($election_start_date_ts>$current_ts)
{
	echo "election did not start please wait.....";
}
else if($current_ts>$election_end_date_ts)
	
{
	
	echo "election has been closed you did not create your vote";
}
else{
	
	?>
	<a href="votecast.php?election_name=<?php echo str_replace(' ','-',$election_name);?>">Click here</a>
	<?php
}
 
}


 ?>
