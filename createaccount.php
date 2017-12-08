<?php
include_once('homepage.php');
require_once("connect-db.php");

if(isset($_POST['id']) && isset($_POST['submit'])){
	$id = $_POST['id'];	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$accountname = $_POST['accountname'];
	$miles = $_POST['miles'];
	$query = "insert into mileageaccount(cid, firstname, lastname, accountname, miles) values ('$id','$firstname','$lastname','$accountname','$miles')";
	$mysqli->query($query);
	$res = $mysqli->query("select sum(miles) from mileageaccount where cid='$id'");
	if (FALSE === $res) die("Select sum failed: ".mysqli_error);
	$row = mysqli_fetch_row($res);
	$sum = $row[0];
	$quer = "select * from reward where cid='$id'";
	$res1 = $mysqli->query($quer);
	if (FALSE === $res1) die("Select in create account failed: ".mysqli_error);
	$row1 = mysqli_num_rows($res1);
	//$row1 = mysqli_fetch_row($res1);
	//$sum1 = $row1[0];
	if($row1 == 0){
	$mysqli->query("insert into reward(cid,miles) values ('$id','$sum')");
}else{
	$mysqli->query("update reward set miles='$sum' where cid='$id'");	
}
	if(!$mysqli) die($mysqli->error);
	header('Location:viewaccount.php');
	exit();
}
$mysqli->close();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Create Reward Account</title>
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
  		<script>
		function validatesignupform(){  
		var firstname=document.signupform.first_name.value;
		var lastname=document.signupform.last_name.value;		
		var email=document.signupform.email.value;
		var street=document.signupform.street.value;
		var city=document.signupform.city.value;
		var state=document.signupform.state.value;	
		var zip=document.signupform.zip.value;
		var country=document.signupform.country.value;	

		if (firstname==null || firstname==""){  
		alert("First name can't be blank!");  
		return false;  
		}
		if (lastname==null || lastname==""){  
		alert("Last name can't be blank!");  
		return false;  
		}
		if (accountname==null || accountname==""){  
		alert("Account Name can't be blank!");  
		return false;  
		}	
		
		if (miles==null || miles==""){  
		alert("Miles can't be blank!");  
		return false;  
		}		
		</script>
  <style>    
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }	
  </style>
</head>

<body>
<?php
include_once('homepage.php');
?>
<div class="container-fluid text-center"> 
        <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title"><center><b>Create Account</b></center></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form name="signupform" action="createaccount.php" method="post" onsubmit="return validatesignupform()">
			    			<div class="row">
<?php
if(isset($_POST['id'])){
	$id = $_POST['id'];
echo "<input type='hidden' name='id' value='$id'>";
}
?>

			    			<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="firstname" id="firstname" class="form-control input-sm" placeholder="First Name" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="lastname" id="lastname" class="form-control input-sm" placeholder="Last Name" required>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="text" name="accountname" id="accountname" class="form-control input-sm" placeholder="Account Name" required>
			    			</div>	
			    				
			    			<div class="form-group">
			    				<input type="text" name="miles" id="miles" class="form-control input-sm" placeholder="Miles" required>
			    			</div>	

			    			<input type="submit" name='submit' value="Create Account" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
</div>

</body>
</html>

