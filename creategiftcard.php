<?php
include_once('homepage.php');
require_once("connect-db.php");

if ($res = $mysqli->query("select * from userlogin where username='$login_session'")){
$row1 = $res->fetch_object();
	$id = $row1->id;
	
}
if(isset($_POST['submit'])){
$giftcardname = $_POST['giftcardname'];
		$dollars = $_POST['dollars'];
	$query = "insert into giftcard(cid,giftcardname,dollars) values ('$id','$giftcardname','$dollars')";
	$mysqli->query($query);
	if(!$mysqli) die($mysqli->error);
	header('Location:viewgiftcard.php');
	exit();
	}

$mysqli->close();
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Create Gift Card</title>
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
			    		<h3 class="panel-title"><center><b>Create Gift Card</b></center></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form name="signupform" action="creategiftcard.php" method="post" onsubmit="return validatesignupform()">
			    			<div class="row">


			    			<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="giftcardname" id="giftcardname" class="form-control input-sm" placeholder="Gift Card Name" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="dollars" id="dollars" class="form-control input-sm" placeholder="Dollars" required>
			    					</div>
			    				</div>
			    			</div>


			    			<input type="submit" value="Create Gift Card" name="submit" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
</div>

</body>
</html>

