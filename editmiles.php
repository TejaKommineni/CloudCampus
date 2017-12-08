<?php
include_once('homepage.php');
require_once("connect-db.php");

if ($res = $mysqli->query("select * from userlogin where username='$login_session'")){
$row1 = $res->fetch_object();
	$id = $row1->id;
	
}
if(isset($_POST['submit'])){
	if(isset($_POST['miles'])){
		$miles = $_POST['miles'];
		$quer = "select * from reward where cid='$id'";
	$res1 = $mysqli->query($quer);
	if (FALSE === $res1) die("Select in create account failed: ".mysqli_error);
	$row1 = mysqli_num_rows($res1);
	//$row1 = mysqli_fetch_row($res1);
	//$sum1 = $row1[0];
	if($row1 == 0){
	$mysqli->query("insert into reward(cid,miles) values ('$id','$miles')");
}else{
	$query = "update reward set miles='$miles' where cid='$id'";
	$mysqli->query($query);
}
	if(!$mysqli) die($mysqli->error);
	header('Location:viewaccount.php');
	exit();
	}
}
$mysqli->close();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Edit Miles</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title"><center><b>Edit Miles</b></center></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form name="milesform" action="editmiles.php" method="post">

			    					<div class="form-group">
			                <input type="text" name="miles" id="miles" class="form-control input-sm" placeholder="Enter Miles" required>
			    					</div>

										    			
							<input type="submit" value="Create Account" name='submit' class="btn btn-info btn-block">

</form>
							</div>
</div>
</div>
</div>
</div>
</body>
</html>