<?php
include_once('homepage.php');
require_once('connect-db.php');
if($mysqli->connect_error) die($mysqli->connect_error);
if(isset($_POST['gid']) && isset($_POST['id']) && isset($_POST['submit']))
{
	$gid = $_POST['gid'];
	$id = $_POST['id'];
	$query = "DELETE FROM giftcard WHERE gid='$gid' and cid='$id'";	
	$result = $mysqli->query($query); 
	if(!$result) die($mysqli->error);	
	header('Location:viewgiftcard.php');	
	exit();
}
?>