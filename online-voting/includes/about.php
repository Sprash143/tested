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
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
<a href="" class="navbar-brand">Online System</a>
</div>
<ul class="nav navbar-nav">
<li><a href="welcome.php">Home</a></li>
<li><a href="idgenerate.php">ID Generate</a></li>
<li><a href="election.php">Election</a></li>
<li><a href="results.php">Results</a></li>
<li><a href="vote.php">Vote</a></li>
<li><a href="logout.php">Logout</a></li>
<li><a href=""><?php echo $_SESSION['user_name'];?></a></li>
</ul>
</div>
</nav>
</div>
<div class="container">
   
        <div class="col-sm-0 col-sm-offset-2 img-thumbnail" style="background-color: brown;">
        <img src="r.jpeg" class="img img-thumbnail img-responsive">
    </div>
</div>
</body>

</html>