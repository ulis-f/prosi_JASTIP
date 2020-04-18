<?php
	$url = $_SERVER['REDIRECT_URL'];
	$baseURL = '/prosi_JASTIP/view';

	if ($_SERVER["REQUEST_METHOD"] == "GET"){
		switch($url){
			case $baseURL . '/register':
				header('location: register.php');
				break;
			default:
				echo '404 Not Found';
				break;
		}
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST") {
		switch($url){
			case $baseURL . '/':
				header('location: register.php');
				break;
			case $baseURL.'/registerKlik':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$roleCtrl->register();
				header('Location: register');
				break;
			default:
				echo '404 Not Found';
				break;
		}
	
	}
		
?>