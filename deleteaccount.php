<?php

//import credentials for db
include_once('homepage.php');
require_once  'connect-db.php';
if($mysqli->connect_error) die($mysqli->connect_error);
if(isset($_POST['aid']) && isset($_POST['id']) && isset($_POST['submit']))
{
	$aid = $_POST['aid'];
	$id = $_POST['id'];
	$query = "DELETE FROM mileageaccount WHERE aid='$aid'";	
	//Run the query
	$result = $mysqli->query($query); 
	$res = $mysqli->query("select sum(miles) from mileageaccount where cid='$id'");
	if (FALSE === $res) die("Select sum failed: ".mysqli_error);
	$row = mysqli_fetch_row($res);
	$sum = $row[0];

if(is_null($sum)){
	$mysqli->query("update reward set miles=0 where cid='$id'");
}else{
	$mysqli->query("update reward set miles='$sum' where cid='$id'");
}
	if(!$result) die($mysqli->error);	
	header('Location:viewaccount.php');	
	exit();
}
?>