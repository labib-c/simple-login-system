<?php
	if(!defined('__CONFIG__')){
		exit('You do not have a config file');
		//should redirect to error page rather than exiting
	}

	if(!isset($_SESSION)){
		session_start();
	}

	//Include the DB.php file
	include_once "classes/DB.php";
	include_once "classes/Filter.php";
	include_once "classes/User.php";
	
	include_once "functions.php";
	
	$con = DB::getConnection();


?>