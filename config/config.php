<?php
	
	mysql_connect('localhost','root','') or die("Database  not connect");
	mysql_select_db('event') or die("No database selected");
	
	$configVars = array();
	error_reporting(0);
	$configVars['my_email'] = 'testmailalert20@gmail.com';
	$configVars['user_name'] = 'testmailalert20@gmail.com';
	$configVars['password'] = 'qwghdvduxumxjidk';

	
	
?>

