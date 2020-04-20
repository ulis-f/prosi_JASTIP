<?php
	$url = $_SERVER['REDIRECT_URL'];
	$baseURL = '/prosi_JASTIP/view';
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "GET"){
		switch($url){
			case $baseURL . '/index':
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_user();
				break;
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
			case $baseURL.'/loginKlik':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$result=$roleCtrl->login();
				if($result != "berhasil"){
					header('Location: index');
				}
				else{
					header('Location: login');
				}
				break;
			case $baseURL.'/hapusAkun':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$roleCtrl->hapusAkun();
				header('Location: login');
				break;
			case $baseURL.'/gantiPass':
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
