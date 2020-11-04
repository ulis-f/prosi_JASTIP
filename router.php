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
				require_once "controller/adminController.php";
				$userctrl = new adminController();
				echo $userctrl->view_index();
				break; 
			case $baseURL . '/persetujuan':
				require_once "controller/adminController.php";
				$userctrl = new adminController();
				echo $userctrl->view_persetujuan();
				break;
			case $baseURL . '/persetujuanBarang':
				require_once "controller/adminController.php";
				$userctrl = new adminController();
				echo $userctrl->view_persetujuanBarang();
				break; 
			case $baseURL . '/profileUser':
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_profileUser();  
				break; 
			case $baseURL . '/titipBarang':
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_titipBarang();  
				break;  
			case $baseURL . '/profileTraveller':
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_profileTraveller();    
				break;  
			case $baseURL . '/profileTravellerMarket':
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_profileTravellerMarket();    
				break;  
			case $baseURL.'/lengkapDaftar':
				require_once "controller/adminController.php";
				$roleCtrl = new adminController();
				echo $roleCtrl->view_getProfile();
				break;
			case $baseURL.'/detailDaftar':
				require_once "controller/adminController.php";
				$roleCtrl = new adminController();
				echo $roleCtrl->view_getProfileLengkap();
				break;
			case $baseURL.'/detailBarang':
				require_once "controller/adminController.php";
				$roleCtrl = new adminController();
				echo $roleCtrl->view_detailBarang();
				break;
			case $baseURL.'/cariNegara':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				echo $roleCtrl->view_getPencarian();
				break;
			case $baseURL.'/cariNegaraOffer':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				echo $roleCtrl->view_getPencarianOffer();
				break;
			case $baseURL . '/market':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_Market();
				break;
			case $baseURL . '/wantedMarket':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_marketWanted();
				break;
			case $baseURL . '/offerMarket':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_marketOffer();
				break;
			case $baseURL . '/addOfferMarket':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_addOffer();
				break;
			case $baseURL . '/addWantedMarket':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_addWanted(); 
				break;
			case $baseURL . '/detailBarangWanted':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_detailBarangMarketWanted(); 
				break;
			case $baseURL . '/detailBarangOffer':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_detailBarangMarketOffer(); 
				break;
			case $baseURL . '/profileUserWantedItem':
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_profileUserWantedItem();   
				break; 
			case $baseURL . '/profileUserOfferItem':
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_profileUserOfferItem();   
				break; 
			case $baseURL . '/detailWantedItemProfile':    
				require_once "controller/userController.php";  
				$userctrl = new userController();
				echo $userctrl->view_detailBarangMarketWantedProfile(); 
				break;
			case $baseURL . '/detailOfferItemProfile':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_detailBarangMarketOfferProfile(); 
				break;  
			case $baseURL . '/beliBarangOffer':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_beliBarangOffer(); 
				break;
			case $baseURL . '/persetujuanTraveller':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				echo $userctrl->view_persetujuanTravellerOffer(); 
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
			case $baseURL.'/verifikasi':
				require_once "controller/adminController.php";
				$roleCtrl = new adminController();
				$roleCtrl->verifikasi();
				header('Location: homeAdmin');
				break;
			case $baseURL.'/verifikasiPendaftaran':
				require_once "controller/adminController.php";
				$roleCtrl = new adminController();
				$roleCtrl->verifikasiDaftar();
				header('Location: lengkapDaftar');
				break;
			case $baseURL.'/updateProfile':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$roleCtrl->updateProfileUser();
				header('Location: profileUser');
				break;
			case $baseURL.'/offerKlik':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$roleCtrl->insertBarangOffer();
				header('Location: offerMarket');
				break;
			case $baseURL.'/wantedKlik':
				require_once "controller/userController.php";
				$roleCtrl = new userController();
				$roleCtrl->insertBarangWanted();
				header('Location: market');
				break;
			case $baseURL.'/verifikasiBarang':
				require_once "controller/adminController.php";
				$roleCtrl = new adminController();
				$roleCtrl->verifikasiBarang();
				header('Location: persetujuanBarang');
				break;
			case $baseURL . '/persetujuanTravellerOffer':    
				require_once "controller/userController.php";
				$userctrl = new userController();
				$userctrl->inserBarangOfferPersetujuan(); 
				header('Location: market');
				break;  
			default:  
				echo '404 Not Found';
				break;
		}
	
	}
		
?>