<?php
require_once('config.php');
require_once('connection.php');
session_start();
if (isset($_GET['controller'])) {
	$controller = $_GET['controller'];
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = 'index';
	}
}
elseif (isset($_POST['controller'])) {
 	$controller = $_POST['controller'];
	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	} else {
		$action = 'index';
	}
} 
else {
  	$controller = 'pages';
  	$action = 'home';
}

if ($controller!='login' && !isset($_SESSION['username'])){
	header('Location: index.php?controller=login');
}

if ($controller=='logout'){
	session_destroy();
	header('refresh:0');
}

require_once('routes.php');