<?php
include("includes/header.php");
?>
<?php
require("includes/conn.php");
$emailError="";
$accountSuccess="";
if(isset($_POST['register']))
{
	$user_name=$_POST['fullname'];	
	$user_email=$_POST['email'];	
      $user_gender=$_POST['gender'];	
	$user_city=$_POST['city'];
	$addhar_card=$_POST['addharcard'];
        $user_password=$_POST['password'];
		$select="select * from users_db where user_email='$user_email'";
		$exe=$conn->query($select);
		if($exe->num_rows>0){
			$emailError= "<p class='text text-center text-danger'>Addhar Card already registerd</p>";
		}
		else 
		{
		$insert="insert into users_db(user_name,user_email,user_gender,user_city,addhar_card,user_password)values
		('$user_name','$user_email','$user_gender','$user_city','$addhar_card','$user_password')";
		$run=$conn->query($insert);
		if($run)
		{
			$accountSuccess="<p class='text text-center text-success'>Account Create Successfully</p>";
		}
		else
		{
			echo "Error";
		}
		}
}
         ?>
<body>
    <br>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 alert alert-success">
                     <h3 class="text text-center bg-primary alert" style="color:white;">User Registration</h3>
                      <?php
                       if($emailError!="")
					   {
                        echo $emailError;
					   }	
                         if($accountSuccess!="")
						 {

                          echo $accountSuccess;
						 }							 
                         ?>


				  <form method="post">
				   <div class="form-group">
                        <label for="exampleInputmail1">Full Name:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" placeholder="Enter Full Name" required>
                    </div>
					<div class="form-group">
                        <label for="exampleInputmail1">AddharCard</label>
<input type="number" class="form-control"  name="email"id="exampleInputEmail1" placeholder="Enter addharcard"required>                 
                 </div>
				 <div class="form-group">
    <label for="Gender">Gender</label>
    <select name="gender" class="form-control">
        <option value="">Select</option>
        <option value="Male">Male</option>
        <option value="female">female</option>

    </select>
</div>
<div class="form-group">
    <label for="city">City</label>
    <select name="city" class="form-control">
        <option value="">Select</option>
        <option value="uttar pradesh">Uttar Pradesh</option>    
		<option value="mumbai">Mumbai</option>
        <option value="delhi">Delhi</option>
		<option value="punjab">Punjab</option>
		<option value="Goa">Goa</option>

    </select>
</div>
<div class="form-group">
<label for="addharcard">Email:</label>
<input type="email" name="addharcard" class="form-control" placeholder="enter the email">
</div>
<div class="form-group">
<label for="password">Password:</label>
<input type="password" name="password" class="form-control">
</div>
<button type="submit" class="btn btn-success btn-block" name="register">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>