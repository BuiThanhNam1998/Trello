<?php
require_once('connection.php');

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
// die($controller);
require_once('routes.php');