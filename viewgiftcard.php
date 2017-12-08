<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Gift Card</title>
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
        	


<?php
// connect to the database
include_once('homepage.php');
require_once('connect-db.php');
if ($res = $mysqli->query("select * from userlogin where username='$login_session'")){
$row1 = $res->fetch_object();
	$id = $row1->id;

}
// get the records from the database
if ($result = $mysqli->query("SELECT * FROM giftcard where cid = '$id'"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4'>";
echo <<<_END
<form method='post' action='creategiftcard.php'>
<input type='hidden' name='id' value='$id'>
<input type='submit' class="btn btn-success btn-block" value='Create Gift Card'>
</form>
</br>
_END;
echo "<h3><b><center>List of Gift Cards</center></b></h3>";
echo "</br>";
echo "<table class='table table-bordered table-hover'>";

echo "<tbody>";
echo "<tr><th>Gift Card Name</th><th>Dollars</th><th></th><th></th></tr>";
while ($row = $result->fetch_object())
{

echo "<tr>";
echo "<td>" . $row->giftcardname . "</td>";
echo "<td>" . $row->dollars . "</td>";
global $gid;
$gid = $row->gid;
echo "<td>";
echo <<<_END
<form method='post' action='editgiftcard.php' id="form1">
<input type='hidden' name='id' value='$id'>
<input type='hidden' name='gid' value='$gid'>
<input type='submit' class="btn btn-info btn-block" value='Edit'>
</form>
_END;
echo "</td>";
echo "<td>";
echo <<<_END
<form method='post' action='deletegiftcard.php' id="form1">
<input type='hidden' name='id' value='$id'>
<input type='hidden' name='gid' value='$gid'>
<input type='submit' name='submit' class="btn btn-info btn-block" value='Delete'>
</form>
_END;
echo "</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "</br></br>";
echo "</div>";
echo "</div>";
echo "</div>";
}
// if there are no records in the database, display an alert message
else
{
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4'>";
echo "</br></br>";
echo "<center>Sorry there are no Gift Cards for this username! Please create it by selecting 'Create Gift Card'</center><br>";
echo <<<_END
<form method='post' action='creategiftcard.php'>
<input type='hidden' name='id' value='$id'>
<input type='submit' class="btn btn-success btn-block" value='Create Gift Card'>
</form>
</br>
_END;
echo "</div>";
echo "</div>";
echo "</div>";
}
}
// show an error if there is an issue with the database query
else
{
echo "Error: " . $mysqli->error;
}

// close database connection
$mysqli->close();

?>



</body>
</html>