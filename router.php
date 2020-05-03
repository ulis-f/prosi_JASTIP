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
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_register();
				break;
			case $baseURL . '/login':
				header('location: login.php');
				break;
			case $baseURL . '/editPass':
				header('location: gantiPassword.php');
				break;
			case $baseURL . '/logout':
				require_once "controller/userController.php";
				$userctrl = new userController();
				$userctrl->logout();
				header('location: index');
				break;
			case $baseURL . '/lengkapPendaftaran':
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_lengkap();
				break;
			case $baseURL . '/postTrip':
				require_once "controller/tripController.php";
				$userctrl = new tripController();
				echo $userctrl->view_posttrip();
				break;
			case $baseURL . '/homeAdmin':
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_Admin();
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
				header('Location: index');
				break;
			case $baseURL.'/loginKlik':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$result=$roleCtrl->login();
				
					header('Location: index');
				
				
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
				header('Location: index');
				break;
			case $baseURL.'/lengkapKlik':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$roleCtrl->lengkapPendaftaran();
				header('Location: index');
				break;
			case $baseURL.'/postKlik':
				require_once "controller/tripController.php";
				$roleCtrl = new tripController();
				$roleCtrl->insertTrip();
				header('Location: index');
				break;
			default:
				echo '404 Not Found';
				break;
		}
	
	}
		
?>
