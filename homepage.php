<?php
include('session.php');
?>
<html>
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
	
  </style>
</head>
<body>
  
<div class="container-fluid text-center">    
<div class="row">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="homepage.php">Cloud Campus</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	  <li><a href="#">Customer Profile</a></li>
	  <li><a href="viewaccount.php">Rewards Account</a></li>
      <li><a href="viewgiftcard.php">Gift Cards</a></li>
	  <li><a href="editmiles.php">Edit Miles</a></li>
	  <li><a href="redeem.php">Redeem</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    </div>
  </div>
</nav>
</div>
  <div>
<h3><b>Welcome <?php echo $login_session; ?></b></h3><br>
</div>
</div>
 

</body>
</html>