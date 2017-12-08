<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include_once('connect-db.php');
// Selecting Database
$db = mysqli_select_db($mysqli,"rewards");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($mysqli,"select username from userlogin where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysqli_close($mysqli); // Closing Connection
header('Location: login.php'); // Redirecting To Home Page
}
?>