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
<div class="row">
    <div class="col-sm-6">
        <h4 class="text text-center text-info alert bg-primary">
		How to Cast Your Vote</h4>
        <ul>

         
         <li>Firstly select <b>"ID Generate"</b>from navigation bar</li> 
         <li>Then send request to<b>"Admin"</b>for Generate Your Id</li>
         <li>
             Click on the <b>"Election"</b>from navigation bar
         </li>  
         <li>
             Select avilable election
         </li>
         <li>
             The secrency of your ballot is mainatined under the high security standards adhered to the Polyas' online voting software
         </li>
         <li>
             Your vote reamins anyone as your system's architecture strictly separtes your personal data from the election ballot
         </li>
        </ul>
    </div>
	
	<div class="col-sm-6">
	<img src="rj.jpeg" class="img img-resposnive img-thumbnail"/>
	</div>
</div>
</div>
