<?php
session_start();
include("includes/header.php");
?>
<?php
require("includes/conn.php");
$Error="";
$success="";

if(isset($_POST['login']))
{
		
	$user_email=$_POST['email'];	
       $user_password=$_POST['password'];
	   $select="select * from users_db where user_email='$user_email' and user_password='$user_password'";
	   $run=$conn->query($select);
	   if($run->num_rows>0){
		   while($row=$run->fetch_array())
		   {
		   $_SESSION['user_name']=$user_name=$row['user_name'];
		   $_SESSION['user_email']=$user_email=$row['user_email'];
		echo"<script>window.location.href='welcome.php'</script>";
		   }
	   }
	   else
	   {
		   $Error="Invalid AddharCard or Password! Try Again";
		   
		   
	   }
}
         ?>
<<body>
    <br>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 alert alert-success">
                     <h3 class="text text-center bg-primary alert" style="color:white;">User Login</h3>
                      <h5 class="text text-center text-danger">
					  <?php
                       if($Error!="")
					   {
                        echo $Error;
					   }	
                         							 
                        
						 if($success!="")
					   {
                        echo $success;
					   }
					   ?>
						 </h5>


				  <form method="post">
				   
					<div class="form-group">
                        <label for="exampleInputmail1">Addhar Card</label>
<input type="text" class="form-control"  name="email"id="exampleInputEmail1" placeholder="Enter addharcard"required>                 
                 </div>
<div class="form-group">
<label for="password">Password:</label>
<input type="password" name="password" class="form-control" placeholder="Enter password">
</div>
<button type="submit" class="btn btn-success btn-block" name="login">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>