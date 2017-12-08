<?php
include_once('homepage.php');
require_once('connect-db.php');

if(isset($_POST['submit']) && $_POST['checkbox'] && $_POST['optradio1']){
//$aid=$_POST['optradio'];
$gid=$_POST['optradio1'];
$miles=0;
global $i;
$i=0;
foreach($_POST['checkbox'] as $checkbox){
	if ($resmiles = $mysqli->query("select * from mileageaccount where aid='$checkbox'")){
$rowmiles = $resmiles->fetch_object();
	$miles = $miles + $rowmiles->miles;
	++$i;
}
}

if ($res = $mysqli->query("select * from userlogin where username='$login_session'")){
$row1 = $res->fetch_object();
	$id = $row1->id;
}

if ($resdollars = $mysqli->query("select * from giftcard where gid='$gid'")){
$rowdollars = $resdollars->fetch_object();
	$dollars = $rowdollars->dollars;

}



if ($dollars<=($miles/4)){
	echo "<br>";
	$new = ($miles/4)-$dollars;
	$new = $new*4;
	$st='';
	$st1='';
	foreach($_POST['checkbox'] as $checkbox){
	
	$new1 = $new/$i;
	//$mysqli->query("update mileageaccount set miles=0 where aid='$checkbox'");
	$query = "update mileageaccount set miles='$new1' where aid='$checkbox'";
	$mysqli->query($query);
	$query = "select * from mileageaccount where aid='$checkbox'";
	$resss = $mysqli->query($query);
	$row12 = $resss->fetch_object();
	$st = $st.$row12->accountname.", ";
}

//$query = "update mileageaccount set miles='$new' where aid='$aid'";
	//$mysqli->query($query);
	$res = $mysqli->query("select sum(miles) from mileageaccount where cid='$id'");
	if (FALSE === $res) die("Select sum failed: ".mysqli_error);
	$row = mysqli_fetch_row($res);
	$sum = $row[0];
	$mysqli->query("update reward set miles='$sum' where cid='$id'");
	$result1 = $mysqli->query("SELECT distinct(giftcardname) FROM giftcard where gid = '$gid'");
	$row1 = $result1->fetch_object();
    $nam = $row1->giftcardname;
	$mysqli->query("insert into review(cid,gname,dollars,accounts_used) values ('$id','$nam','$dollars','$st')");
	header('Location:redeem.php');
}else {
	$msg = "Insuffienct miles in the selected rewards account";
	echo "<div class='alert alert-danger' role='alert'>" .$msg."</div>";
	echo "<a href='redeem.php'>"."Back to Redeem page"."</a>";
}

	
	

}else{
	echo "Please select the options and then submit!<br>";
	
	echo "<a href='redeem.php'>"."Back to Redeem page"."</a>";
}
?>