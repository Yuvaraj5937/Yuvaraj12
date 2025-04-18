<?php
	session_start();	
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("event") or die(mysql_error());
	error_reporting(0);
	$blood_groups = getBloodGroups();

	$configVars = array();
	$configVars['my_email'] = 'ascentzpica@gmail.com';
	$configVars['user_name'] = 'ascentzpica@gmail.com';
	$configVars['password'] = 'preventing';

function getBloodGroups(){
	$return_array = array();
	$query = "select * from blood ";
	$res = mysql_query($query);
	while($row = mysql_fetch_assoc($res)){
		$return_array[$row['id']] = $row['group'];
	}
	return $return_array;
}

function isLoggedIn(){
	if(!isset($_SESSION['user']) || !isset($_SESSION['user']['sno'])){
		ob_clean();
		$_SESSION['msg'] = 'Please Login';
		header("location:login.php");
		exit;
	}
}
?>
