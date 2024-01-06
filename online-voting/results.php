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
<h3 class="text text-info text-center">Result portion</h3>
<p class="text text-danger"> In this section  those elections results display which are closed or date expire</p>
<form method="post">
<div class="form-group">
<select class="form-control" name="election_name">
<option "selected="selected" value="">Select Election</option>

<?php
$current_ts=time();
require("includes/conn.php");
$select="select * from election_tbl";
$run=$conn->query($select);
if($run->num_rows>0)
{

while($row=$run->fetch_array())
{
	$election_name=$row['election_name'];
	$election_start_date=$row['election_start_date'];
	$election_end_date=$row['election_end_date'];
?>
<?php
$election_end_date_ts=strtotime($election_end_date);
if($election_end_date_ts<$current_ts){
?>
<option value="<?php echo $election_name;?>"><?php echo $election_name;?></option>
<?php
}
}


}



?>
</select>
<div class="form-group">
<input type="submit" name="search-results" class="btn btn-success" value="Search Result">


</div>


</form>
<table class="table table responsive table-hover table-bordered text-danger text-center">

<tr>
<td>#</td>
<td>Candidates Name</td>
<td>Obatin votes</td>
<td>Winnig status</td>
</tr>
<?php
if(isset($_POST['search-results']))
{
$election_name=$_POST['election_name'];
$select="select * from results_tbl where election_name='$election_name'";
$run=$conn->query($select);
if($run->num_rows>0)
{
	$total_election_votes=0;
	while($row=$run->fetch_array())
	{
		 $total_election_votes=$total_election_votes+1;
	}
}
$select1="select * from candidates_tbl where election_name='$election_name'";
$run1=$conn->query($select1);
if($run1->num_rows>0)
	
{
	$total=0;
	while($row2=$run1->fetch_array())
		
	{
		$total=$total+1;
		$candidates_name=$row2['candidates_name'];
		$total_votes=$row2['total_votes'];
		$percentage=(($total_votes/$total_election_votes)*100);
	?>
	<tr>
	<td><?php echo $total;?></td>
	<td><?php echo $candidates_name;?></td>
	<td><?php echo $total_votes;?></td>
	<td><?php echo $percentage;?>%</td>
	</tr>
	
	
	<?php
	}
	?>
	
	<tr>
	<td colspan="2"> Total Votes</td>
	<td><?php echo $total_election_votes;?></td>
	<td>
	</td>
	
	</tr>
	<?php
	
}
else
{
?>
	<tr>
<td colspan="4">Record Not Found</td>
</tr>
<?php	
	
}

}
?>
</table>
</div>



</div>
</div>
