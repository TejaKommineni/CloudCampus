<?php
include_once('homepage.php');
require_once('connect-db.php');

if ($res = $mysqli->query("select * from userlogin where username='$login_session'")){
$row1 = $res->fetch_object();
	$id = $row1->id;
}








if ($result = $mysqli->query("SELECT * FROM review where cid = '$id'"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4'>";

echo "<h3><b><center>List of Redeemed Gift Cards</center></b></h3>";
echo "</br>";
echo "<table class='table table-bordered table-hover'>";

echo "<tbody>";
echo "<tr><th>Gift Card Name</th><th>Dollars</th><th>Accounts Used</th></tr>";
while ($row = $result->fetch_object())
{

echo "<tr>";
echo "<td>" . $row->gname . "</td>";
echo "<td>" . $row->dollars . "</td>";
echo "<td>" . $row->accounts_used . "</td>";
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
echo "<center>Sorry you have not redeemed any Gift Cards! Please redeem it by selecting 'Redeem'</center><br>";
echo "</div>";
echo "</div>";
echo "</div>";
}
}



















if ($result = $mysqli->query("SELECT * FROM mileageaccount where cid = '$id'"))
{
if ($result->num_rows > 0)
{
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4'>";
	echo "<form action='redeem1.php' method='POST'>";
	 echo "<Label>Select Reward Account:</Label>";
	while ($row = $result->fetch_object())
{

echo "<div class='checkbox'>";
 echo "<label>";
 echo "<input type='checkbox' class='form' name='checkbox[]' value='$row->aid'>".$row->accountname." (".$row->miles." miles)";
 echo "</label>"; 
 echo "</div>";
}



if ($result1 = $mysqli->query("SELECT * FROM giftcard where cid = '$id'"))
{
if ($result1->num_rows > 0)
{
	 echo "<br><br><Label>Select Gift Card:</Label>";
	while ($row1 = $result1->fetch_object())
{

echo "<div class='radio'>";
 echo "<label>";
 echo "<input type='radio' name='optradio1' value='$row1->gid' required>".$row1->giftcardname." (".$row1->dollars."$)";
 echo "</label>"; 
  echo "</div>";
}
}else
{

echo "</br></br>";
echo "<center>Sorry there are no Gift cards for this username! Please create it by selecting 'Create Gift card' under Gift card option!</center><br>";
}
}

echo "<br><br><input type='submit' name='submit' class='btn btn-info'>";
echo "</form>";
echo "</div>";
echo "</div>";
echo "</div>";
}else
{
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4'>";
echo "</br></br>";
echo "<center>Sorry there are no rewards accounts for this username! Please create it by selecting 'Create Account'</center><br>";
echo <<<_END
<form method='post' action='createaccount.php'>
<input type='hidden' name='id' value='$id'>
<input type='submit' class="btn btn-success btn-block" value='Create Account'>
</form>
</br>
_END;
echo "</div>";
echo "</div>";
echo "</div>";
}

}
?>