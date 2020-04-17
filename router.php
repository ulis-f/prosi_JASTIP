<?php
	$url = $_SERVER['REDIRECT_URL'];
	$baseURL = '/PROSI_JASTIP/view';

	else if ($_SERVER["REQUEST_METHOD"] == "POST") {
		switch($url){
			case $baseURL.'/register':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$roleCtrl->register();
				header('Location: index');
				break;
		}
	
	}
		
?>