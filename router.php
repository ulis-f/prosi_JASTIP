<?php
	$url = $_SERVER['REDIRECT_URL'];
	$baseURL = '/php3p';

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		switch ($url) {
			case $baseURL.'/index':
				require_once "controller/libraryController.php";
				$libraryCtrl = new LibraryController();
				echo $libraryCtrl->view_index();
				break;
			case $baseURL.'/add':
				require_once "controller/libraryController.php";
				$libraryCtrl = new LibraryController();
				echo $libraryCtrl->view_add();
				break;
			case $baseURL.'/rent':
				require_once "controller/libraryController.php";
				$libraryCtrl = new LibraryController();
				echo $libraryCtrl->view_rent();
				break;
			default:
				echo '404 Not Found';
				break;
		}
	}else if($_SERVER["REQUEST_METHOD"] == "POST"){
		switch ($url) {
			case $baseURL.'/addBook':
				require_once "controller/libraryController.php";
				$roleCtrl = new LibraryController();
				$roleCtrl->addBook();
				header('Location: index');
				break;
			case $baseURL.'/rent':
				require_once "controller/libraryController.php";
				$roleCtrl = new LibraryController();
				$roleCtrl->rentBook();
				header('Location: index');
				break;
			case $baseURL.'/return':
				require_once "controller/libraryController.php";
				$roleCtrl = new LibraryController();
				$roleCtrl->returnBook();
				header('Location: index');
				break;
			case $baseURL.'/deleteBook':
				require_once "controller/libraryController.php";
				$roleCtrl = new LibraryController();
				$roleCtrl->deleteBook();
				header('Location: index');
				break;
			default:
				echo '404 Not Found';
				break;
		}
	}
		
?>