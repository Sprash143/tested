<?php
session_start();
include("includes/about.php");
if(!$_SESSION['user_id_generated'])
{
	
	echo"<script>window.location.href='election.php'</script>";

exit();
}
?>
<br>
<div class="conatiner">
<div class="col-md-6 col-md-offset-3">
<form method="post">
<?php
require("includes/conn.php");

$election_name=$_GET['election_name'];  
$election_name=str_replace('-',' ',$election_name);
?>

<div class="form-group">
<input type='text' value="<?php echo$election_name;?>" class='form-control' readonly/>
</div>
<?php
$select="select * from  candidates_tbl where election_name='$election_name'";
$run=$conn->query($select);
	if($run->num_rows>0)
	{
	while($row=$run->fetch_array())
	{
      	  
		?>
		<div class="form-group">
		<input type="radio" name="candidates_name" class="list-group" value="<?php echo $row['candidates_name'];?>">
<label><?php echo $row['candidates_name'];?></label>
</div>
		
		<?php
		
		
		
		
		
		
	}
	
	
	}
?>
<input type="submit" name="vote_caste" class="btn btn-success" value="Now Caste Your Vote">
</form>
</div>
</div>
<?php 
if(isset($_POST['vote_caste']))
{
	$candidates_name=$_POST['candidates_name'];
	$user_email=$_SESSION['user_email'];
	$select="select * from results_tbl where user_email='$user_email' and election_name='$election_name'";
	$exe1=$conn->query($select);
	if($exe1->num_rows>0)
	{
		echo "You have  already caste your vote aginst Election".$election_name;
	}
	else{
		
		$insert="insert into results_tbl(user_email,candidates_name,election_name)
	values('$user_email','$candidates_name','$election_name')";
$run=$conn->query($insert);
if($run)
{

$update="update candidates_tbl set total_votes='total_votes'+'1' where candidates_name='$candidates_name' and election_name='$election_name'";
$exe=$conn->query($update);
if($exe)
{
	echo " You have Successfully caste your vote ";
}
else{
	echo "You did not caste vote";
}
}	

else
{
	echo "Error";
}
	}
    
}

?>

