<?php
	$url = $_SERVER['REDIRECT_URL'];
	$baseURL = '/prosi_JASTIP/view';
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "GET"){
		switch($url){
			case $baseURL . '/register':
				header('location: register.php');
				break;
			case $baseURL . '/login':
				header('location: login.php');
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
			case $baseURL.'/cekLogin':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$result=$roleCtrl->login();
				if($result = true){
					header('Location: index');
				}
				else{
					header('Location: login')
				}
				break;
			case $baseURL.'/hapusAkun':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$roleCtrl->hapusAkun();
				header('Location: login');
				break;
			case $baseURL.'/updatePass':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$roleCtrl->updatePass();
				header('Location: login');
				break;
			default:
				echo '404 Not Found';
				break;
		}
	
	}
		
?>