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
<div class="col-md-6 col-md-offset-3">


<form method="post">
				   
					<div class="form-group">
                        <label for="exampleInputmail1">Your ID</label>
<input type="text" class="form-control"  name="user_id"id="exampleInputEmail1" placeholder="Enter your Id"required>                 
                 </div>
<div class="form-group"
<label for="password">Password:</label>
<input type="password" name="user_password" class="form-control" placeholder="Enter password">
</div>
<div class="form-group">
<button type="submit" class="btn btn-success btn-block" name="login">Enter Voting Area</button>
                
				</div>
				</form>
</div>
</div>
<?php
require("includes/conn.php");
if(isset($_POST['login']))
{
	$user_id=$_POST['user_id'];
	$user_password=$_POST['user_password'];
	$select="select * from users_db where user_password='$user_password' and user_id_generated='$user_id'";
	$run=$conn->query($select);
	if($run->num_rows>0)
	{
		while($row=$run->fetch_array())
		{
			$_SESSION['user_id_generated']=$user_id_generated=$row['user_id_generated']; 
			
		}
		header('location:vote.php');
	}
	else
	{
		echo "Your Id and Password Invalid";
	}
		
}
?>