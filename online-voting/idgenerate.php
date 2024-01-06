<?php
session_start();
include("includes/about.php");
if(!$_SESSION['user_email'])
{
	
	echo"<script>window.location.href='login.php'</script>";
}
?>
<br>
<div class="conatiner">
<?php
require("includes/conn.php");
$user_email=$_SESSION['user_email'];
$select="select * from id_request_tbl where user_email='$user_email'";
	$run=$conn->query($select);
	if($run->num_rows>0)
	{
		?>
		<div class="col-sm-6 col-sm-offset-3 bg-info alert">
		<h4>Your Request Already Submited</h4>
		</div>
		<?php
	
	}
	else{
		
		?>
		<?php
		$select="select * from users_db where user_email='$user_email'";
$run=$conn->query($select);
	   if($run->num_rows>0){
		   while($row=$run->fetch_array())
		   {
			   $user_name=$row['user_name'];
			    $user_email=$row['user_email'];
			    $user_city=$row['user_city'];
				$user_id_generated=$row['user_id_generated'];
		   }
	   }
	   if($user_id_generated!="")
	   {
		   ?>
		   <div class="col-sm-6 col-sm-offset-3 bg-info alert">
		   <h4> Your ID is "<span class="text text-danger"><?php echo$user_id_generated?></span>"</h4>
		   <p><b>Note:</b> Use this is with login password to caste your vote</p>
		   </div>
		   <?php
	   }
	   else{
		  ?> <div class="col-sm-6 col-sm-offset-3 bg-info alert">
<form method="post">
			<div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
<input type="text" class="form-control"  name="user_name"id="exampleInputEmail1" 
placeholder="Enter the username"required value="<?php echo$user_name;?>"  readonly>                
                 </div>
				 <div class="form-group">
                        <label for="exampleInputEmail1"> User AddharCard</label>
<input type="number" class="form-control"  name="user_email"id="exampleInputEmail1" 
placeholder="Enter email"required value="<?php echo$user_email;?>" readonly>                  
                 </div>
<div class="form-group">
                        <label for="exampleInputEmail1">City</label>
<input type="email" class="form-control"  name="user_city"id="exampleInputEmail1" 
placeholder="Enter the city"required value="<?php echo$user_city;?>"  readonly>                  
                 </div>
<div class="form-group">

<button type="submit" class="btn btn-info btn block" name="idrequest">ID Request</button>
</div>
                </form>        
</div>
</div>
	
	

	


<?php
	}
	}
	?>
	<?php
if(isset($_POST['idrequest']))
{
	$user_email=$_POST['user_email'];
	$user_province=$_POST['user_city'];
	require("includes/conn.php");
	
	
	
		
		$insert="insert into id_request_tbl (user_email,user_city) values('$user_email','$user_city')";
	$run=$conn->query($insert);
	if($run)
	{
		echo"<script> alert('Your Request Already has been Successfully')</script>";
		header("location:idgenerate.php");
		
	}
	else
	{
		
		echo"Error";
	}

}
	
	?>
	