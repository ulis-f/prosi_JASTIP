<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/user.php";
require_once "model/trip.php";
require_once "model/transaksi.php";
require_once "model/kategori.php";
require_once "model/notifikasi.php";
require_once "model/barang.php";
require_once "model/detailOffer.php";
require_once "model/wanted.php";
require_once "model/pembayaran.php";
require_once "model/Tracking.php";
class UserController
{
	protected $db;

	public function __construct()
	{
		$this->db = new MySQLDB("localhost", "root", "", "titipaja");
	}

	public function view_user()
	{
		$title = "titipaja.com - index";
		$result = $this->getTraveller();
		if (isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		} else {
			$nama = null;
		}
		if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
			$auth = $_SESSION['auth'];
		} else {
			$auth = 1;
		}
		$lengkap = $this->cekMelengkapiPendaftaran($nama);

		return view::createView('halamanUtamaMember.php', ["nama" => $nama, "title" => $title, "auth" => $auth, "result" => $result, "lengkap" => $lengkap]);
	}
	public function view_getPencarian()
	{
		$title = "titipaja.com - index";
		$result = $this->getPencarian();
		if (isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		} else {
			$nama = null;
		}
		if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
			$auth = $_SESSION['auth'];
		} else {
			$auth = 1;
		}
		$lengkap = $this->cekMelengkapiPendaftaran($nama);

		return view::createView('halamanUtamaMember.php', ["nama" => $nama, "title" => $title, "auth" => $auth, "result" => $result, "lengkap" => $lengkap]);
	}

	public function view_getPencarianOffer()
	{
		$title = "titipaja.com - index";
		$result = $this->getPencarianOffer();
		if (isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		} else {
			$nama = null;
		}
		return view::createView('marketOfferItem.php', ["nama" => $nama, "title" => $title, "result" => $result]);
	}

	public function view_lengkap()
	{
		$nama = $_SESSION['nama'];
		$title = "titipaja.com - Melengkapi Pendaftaran";
		return view::createView('lengkapiPendaftaran.php', ["nama" => $nama, "title" => $title]);
	}

	public function view_titipBarang()
	{
		$nama = $_SESSION['nama'];
		$title = "titipaja.com - Titip Barang";
		return view::createView('titipBarang.php', ["nama" => $nama, "title" => $title]);
	}

	public function view_register()
	{
		return view::createViewRegister('register.php', []);
	}

	public function view_Admin()
	{
		return view::createViewAdmin('homeAdmin.php', []);
	}

	public function view_Market()
	{
		$result = $this->getWanted();
		if (isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		} else {
			$nama = null;
		}
		if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
			$auth = $_SESSION['auth'];
		} else {
			$auth = 1;
		}
		$title = "titipaja.com - Market";
		return view::createViewMarket('market.php', ["nama" => $nama, "title" => $title, "auth" => $auth, "result" => $result]);
	}

	public function view_marketWanted()
	{
		if (isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		} else {
			$nama = null;
		}
		$title = "titipaja.com - Market";
		return view::createViewMarket('wantedItem.php', ["nama" => $nama, "title" => $title]);
	}

	public function view_addWanted()
	{
		$kategori = $this->getKategori();
		if (isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		} else {
			$nama = null;
		}
		$title = "titipaja.com - Market";
		return view::createViewMarket('wantedItem.php', ["nama" => $nama, "title" => $title, "kategori" => $kategori]);
	}

	public function view_marketOffer()
	{
		$result = $this->getOffer();
		if (isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		} else {
			$nama = null;
		}
		if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
			$auth = $_SESSION['auth'];
		} else {
			$auth = 1;
		}
		$title = "titipaja.com - Market";
		return view::createViewMarket('marketOfferItem.php', ["nama" => $nama, "title" => $title, "auth" => $auth, "result" => $result]);
	}

	public function view_addOffer()
	{
		$result = $this->getTripSendiriOffer();
		$kategori = $this->getKategori();
		if (isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		} else {
			$nama = null;
		}
		$title = "titipaja.com - Market";
		return view::createViewMarket('offerItem.php', ["nama" => $nama, "title" => $title, "result" => $result, "kategori" => $kategori]);
	}

	public function view_detailBarangMarketWanted()
	{
		$nama = $_SESSION['nama'];
		$namaBarang = $_GET['namaBarang'];
		$idUser = $_GET['id'];
		$result = $this->getDetailBarangMarket($namaBarang, $idUser);
		return view::createViewMarket("detailBarangWanted.php", ["nama" => $nama, "result" => $result]);
	}

	public function view_detailBarangMarketOffer()
	{
		$nama = $_SESSION['nama'];
		$namaBarang = $_GET['namaBarang'];
		$idUser = $_GET['id'];
		$result = $this->getDetailBarangOffer($namaBarang, $idUser);
		return view::createViewMarket("detailBarangOffer.php", ["nama" => $nama, "result" => $result]);
	}
	public function view_detailBarangMarketOfferProfile()
	{
		$nama = $_SESSION['nama'];
		$namaBarang = $_GET['namaBarang'];
		$idUser = $_GET['id'];
		$result = $this->getDetailBarangOffer($namaBarang, $idUser);
		return view::createViewMarket("detailOfferItemProfile.php", ["nama" => $nama, "result" => $result]);
	}

	public function view_detailBarangMarketWantedProfile()
	{
		$nama = $_SESSION['nama'];
		$namaBarang = $_GET['namaBarang'];
		$idUser = $_GET['id'];
		$result = $this->getDetailBarangMarket($namaBarang, $idUser);
		return view::createViewMarket("detailWantedItemProfile.php", ["nama" => $nama, "result" => $result]);
	}


	public function view_profileUser()
	{
		$nama = $_SESSION['nama'];
		$foto = $this->getFotoProfile();
		$result = $this->getTripSendiri();
		$resultA = $this->getProfileSendiri();
		$title = "titipaja.com - Profile User";
		return view::createView('profileUser.php', ["nama" => $nama, "title" => $title, "result" => $result, "resultA" => $resultA, "foto" => $foto]);
	}

	public function view_profileUserWantedItem()
	{
		$nama = $_SESSION['nama'];
		$foto = $this->getFotoProfile();
		$resultA = $this->getProfileSendiri();
		$result = $this->getWantedSendiri();
		$title = "titipaja.com - Profile User";
		return view::createView('wantedItemProfile.php', ["nama" => $nama, "title" => $title, "resultA" => $resultA, "foto" => $foto, "result" => $result]);
	}

	public function view_profileUserOfferItem()
	{
		$nama = $_SESSION['nama'];
		$foto = $this->getFotoProfile();
		$resultA = $this->getProfileSendiri();
		$result = $this->getOfferSendiri();
		$title = "titipaja.com - Profile User";
		return view::createView('itemOfferProfile.php', ["nama" => $nama, "title" => $title, "resultA" => $resultA, "foto" => $foto, "result" => $result]);
	}

	public function view_profileTraveller()
	{
		$nama = $_SESSION['nama'];
		$result = $this->getTripSendiri();
		$title = "titipaja.com - Profile User";
		return view::createView('profileTraveller.php', ["nama" => $nama, "title" => $title, "result" => $result]);
	}

	public function view_profileTraveller1()
	{
		$nama = $_SESSION['nama'];
		$title = "titipaja.com - Profile";
		$result = $this->getProfileTraveller($nama);
		return view::createView('profileTraveller.php', ["nama" => $nama, "title" => $title, "result" => $result]);
	}
	public function view_profileTravellerMarket()
	{
		$nama = $_GET['namaUser'];
		$title = "titipaja.com - Profile";
		$result = $this->getProfileTravellerMarket($nama);
		return view::createView('profileTraveller.php', ["nama" => $nama, "title" => $title, "result" => $result]);
	}
	public function view_beliBarangOffer()
	{
		if (isset($_GET['profile'])) {
			$this->view_profileTraveller();
		} else if (isset($_GET['beliBarang'])) {
			$nama = $_SESSION['nama'];
			$title = "titipaja.com - Beli Barang";
			$result = $this->getBeliBarangOffer();
			return view::createView('beliBarang.php', ["title" => $title, "result" => $result, "nama" => $nama]);
		}
	}

	public function view_beliBarangWanted()
	{
		$nama = $_SESSION['nama'];
		$title = "titipaja.com - Beli Barang";
		$trip = $this->getTripSendiriOffer();
		$result = $this->getBeliBarangWanted();
		return view::createView('beliBarangWanted.php', ["title" => $title, "result" => $result, "nama" => $nama, "trip" => $trip]);
	}

	public function view_PembayaranOffer()
	{
		$nama = $_SESSION['nama'];
		$result = $this->getPembayaranOfferDua();
		return view::createView('pembayaran.php', ["nama" => $nama, "result" => $result]);
	}


	public function view_pembayaranMarketWanted()
	{
		// kalau wanted, idCustomer adalah yang memposting gambar wanted, idTraveller adalah yang membelikan barang di luar negeri
		// kalau offer, idCustomer adalah yang membayar barang offer, idTraveller adalah yang memposting barang offer
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');
		$idCustomer = $_GET['idUser'];
		$query_idUser = "SELECT * FROM `user` WHERE `idUser` LIKE '$idCustomer' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser_customer = $query_idUser_result[0]['idUser'];

		$namaBarang = $_GET['namaBarang'];
		$nama = $_SESSION['nama'];
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser_traveller = $query_idUser_result[0]['idUser'];

		$nama = $_SESSION['nama'];

		$idTrip = $_GET['idTrip'];
		if ($_GET['verified'] == 'verified') {
			$result = $this->getPembayaranWanted();
			$query_notifikasi = "INSERT INTO Notifikasi VALUES ('$idUser_customer',null,'Verifikasi Penitipan Barang Berhasil', 'Permintaan anda berhasil diterima', 0, '$now')";
			$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi);
			$query_transaksi = "UPDATE transaksi SET idTrip = '$idTrip', idUser2 = '$idUser_customer' WHERE idUser1 = '$idUser_traveller' AND namaBarang ='$namaBarang'";
			$query_result2 = $this->db->executeNonSelectQuery($query_transaksi);
			return view::createView('pembayaran.php', ["nama" => $nama, "result" => $result]);
		} else {
			$result = $this->getWanted();
			if (isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
				$nama = $_SESSION['nama'];
			} else {
				$nama = null;
			}
			if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
				$auth = $_SESSION['auth'];
			} else {
				$auth = 1;
			}
			$title = "titipaja.com - Market";
			if ($_GET['jumlahBarang'] != null) {
				$link = '<form action="detailBarangWanted" method="GET">
				<button  id="persetujuanTraveller" style="color:#f3310a;" class="w3-bar-item w3-display-inline  w3-btn" >Klik di Sini Untuk Menuju Market</button>
				<input type="hidden" name="namaBarang" value="' . $namaBarang . '">
				<input type="hidden" name="id" value="' . $idUser_traveller . '">
				</form>';
			} else {
				$link = '<form action="detailBarangOffer" method="GET">
				<button  id="persetujuanTraveller" style="color:#f3310a;" class="w3-bar-item w3-display-inline  w3-btn" >Klik di Sini Untuk Menuju Market</button>
				<input type="hidden" name="namaBarang" value="' . $namaBarang . '">
				<input type="hidden" name="id" value="' . $idUser_traveller . '">
				</form>';
			}
			$note = $_GET['note'];
			$query_notifikasi = "INSERT INTO Notifikasi VALUES ('$idUser_customer',null,'Verifikasi Gagal', '$note $link', 0, '$now')";
			$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi);
			return view::createViewMarket('market.php', ["nama" => $nama, "title" => $title, "auth" => $auth, "result" => $result]);
		}
	}

	public function view_pembayaranMarketOffer()
	{
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');
		$idCustomer = $_GET['idUser'];
		$query_idUser = "SELECT * FROM `user` WHERE `idUser` LIKE '$idCustomer' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser_customer = $query_idUser_result[0]['idUser'];

		$namaBarang = $_GET['namaBarang'];
		$nama = $_SESSION['nama'];
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser_traveller = $query_idUser_result[0]['idUser'];

		$nama = $_SESSION['nama'];
		if ($_GET['verified'] == 'verified') {
			$link = '<form action="pembayaranOffer" method="GET">
			<button  id="pembayaranOffer" style="color:#f3310a;" class="w3-bar-item w3-display-inline  w3-btn" >Klik di Sini Untuk Pembayaran</button>
			<input type="hidden" name="namaBarang" value="' . $namaBarang . '">
			<input type="hidden" name="totalHarga" value="' . $namaKategori . '">
			<input type="hidden" name="kotaAwal" value="' . $hargaDiJual . '">
			<input type="hidden" name="kotaTujuan" value="' . $hargaOngkir . '">
			<input type="hidden" name="waktuAwal" value="' . $totalHarga . '">
			<input type="hidden" name="waktuAkhir" value="' . $deskripsi . '">
			<input type="hidden" name="deskripsi" value="' . $kotaAwal . '">
			<input type="hidden" name="tipTraveller" value="' . $kotaTujuan . '">
			<input type="hidden" name="gambar" value="' . $gambar . '">
			<input type="hidden" name="fee" value="' . ($totalHarga * (4 / 100)) . '">
			<input type="hidden" name="kodeUnik" value="' . rand(100, 999) . '">
			</form>';
			$query_notifikasi = "INSERT INTO Notifikasi VALUES ('$idUser_customer',null,'Verifikasi Penitipan Barang Berhasil', 'Permintaan anda berhasil diterima $link', 0, '$now')";
			$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi);
			$query_transaksi = "UPDATE transaksi SET  idUser2 = '$idUser_customer', statusBarang = 'onPayment', jumlahBarang = '1', hargaOngkir = '$hargaOngkir', hargaBarang = '$hargaBarang' WHERE idUser1 = '$idUser_traveller' AND namaBarang ='$namaBarang'";
			$query_result2 = $this->db->executeNonSelectQuery($query_transaksi);
		}
	}

	public function view_tracking()
	{
		$nama = $_SESSION['nama'];
		$hasil = $this->getTracking($nama);
		$hasil2 = $this->getTracking2($nama);
		$hasil3 = $this->getTracking3($nama);
		$hasil4 = $this->getTracking4($nama);
		$hasil5 = $this->getTracking5($nama);
		return view::createView('tracking.php', ["nama" => $nama, "hasil" => $hasil, "hasil2" => $hasil2, "hasil3" => $hasil3, "hasil4" => $hasil4, "hasil5" => $hasil5]);
	}

	public function getTracking($nama)
	{
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT himpB.idUser1, himpB.idTrip, himpB.idUser2, himpB.hargaBarang, himpB.hargaOngkir, himpB.hargaJasa, himpB.namaBarang, himpB.deskripsiBarang, himpB.gambarBarang, himpB.kodeUnik,himpB.idKota2,himpB.waktuAwal, himpB.waktuAkhir, himpB.kota_awal, kota.namaKota as 'kota_tujuan'
		FROM kota inner join (SELECT himpA.idUser1, himpA.idTrip, himpA.idUser2, himpA.hargaBarang, himpA.hargaOngkir, himpA.hargaJasa, himpA.namaBarang, himpA.deskripsiBarang, himpA.gambarBarang, himpA.kodeUnik,himpA.idKota2,himpA.waktuAwal, himpA.waktuAkhir, kota.namaKota as 'kota_awal'
					FROM kota inner join (SELECT  idUser1, transaksi.idTrip, idUser2, hargaBarang ,hargaOngkir, hargaJasa, namaBarang, deskripsiBarang,gambarBarang, kodeUnik,idKota1, idKota2,waktuAwal, waktuAkhir
										FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
										WHERE idUser2 = $idUser AND statusBarang = 'onDelivery') as himpA on kota.idKota = himpA.idKota1) as himpB  on kota.idKota = himpB.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$hargaTotal = $value['hargaBarang'] + $value['hargaOngkir'] + $value['hargaJasa'] + $value['kodeUnik'];
			$result[] = new Tracking($value['namaBarang'], $value['deskripsiBarang'], $value['hargaBarang'], $value['hargaOngkir'], $value['hargaJasa'], $hargaTotal, $value['kodeUnik'], $value['gambarBarang'], $value['idTrip'], $value['kota_awal'], $value['kota_tujuan'], $value['waktuAwal'], $value['waktuAkhir'], null);
		}
		return $result;
	}
	public function getTracking2($nama)
	{
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT himpB.idUser1, himpB.idTrip, himpB.idUser2, himpB.hargaBarang, himpB.hargaOngkir, himpB.hargaJasa, himpB.namaBarang, himpB.deskripsiBarang, himpB.gambarBarang, himpB.kodeUnik,himpB.idKota2,himpB.waktuAwal, himpB.waktuAkhir, himpB.kota_awal, kota.namaKota as 'kota_tujuan'
		FROM kota inner join (SELECT himpA.idUser1, himpA.idTrip, himpA.idUser2, himpA.hargaBarang, himpA.hargaOngkir, himpA.hargaJasa, himpA.namaBarang, himpA.deskripsiBarang, himpA.gambarBarang, himpA.kodeUnik,himpA.idKota2,himpA.waktuAwal, himpA.waktuAkhir, kota.namaKota as 'kota_awal'
					FROM kota inner join (SELECT  idUser1, transaksi.idTrip, idUser2, hargaBarang ,hargaOngkir, hargaJasa, namaBarang, deskripsiBarang,gambarBarang, kodeUnik,idKota1, idKota2,waktuAwal, waktuAkhir
										FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
										WHERE idUser2 = $idUser AND statusBarang = 'onDeliveryToIndo') as himpA on kota.idKota = himpA.idKota1) as himpB  on kota.idKota = himpB.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$hargaTotal = $value['hargaBarang'] + $value['hargaOngkir'] + $value['hargaJasa'];
			$result[] = new Tracking($value['namaBarang'], $value['deskripsiBarang'], $value['hargaBarang'], $value['hargaOngkir'], $value['hargaJasa'], $hargaTotal, $value['kodeUnik'], $value['gambarBarang'], $value['idTrip'], $value['kota_awal'], $value['kota_tujuan'], $value['waktuAwal'], $value['waktuAkhir'], null);
		}
		return $result;
	}
	public function getTracking3($nama)
	{
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT himpB.idUser1, himpB.idTrip, himpB.idUser2, himpB.hargaBarang, himpB.hargaOngkir, himpB.hargaJasa, himpB.namaBarang, himpB.deskripsiBarang, himpB.gambarBarang, himpB.kodeUnik,himpB.idKota2,himpB.waktuAwal, himpB.waktuAkhir, himpB.kota_awal, kota.namaKota as 'kota_tujuan'
		FROM kota inner join (SELECT himpA.idUser1, himpA.idTrip, himpA.idUser2, himpA.hargaBarang, himpA.hargaOngkir, himpA.hargaJasa, himpA.namaBarang, himpA.deskripsiBarang, himpA.gambarBarang, himpA.kodeUnik,himpA.idKota2,himpA.waktuAwal, himpA.waktuAkhir, kota.namaKota as 'kota_awal'
					FROM kota inner join (SELECT  idUser1, transaksi.idTrip, idUser2, hargaBarang ,hargaOngkir, hargaJasa, namaBarang, deskripsiBarang,gambarBarang, kodeUnik,idKota1, idKota2,waktuAwal, waktuAkhir
										FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
										WHERE idUser2 = $idUser AND statusBarang = 'arrivedInIndo') as himpA on kota.idKota = himpA.idKota1) as himpB  on kota.idKota = himpB.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$hargaTotal = $value['hargaBarang'] + $value['hargaOngkir'] + $value['hargaJasa'];
			$result[] = new Tracking($value['namaBarang'], $value['deskripsiBarang'], $value['hargaBarang'], $value['hargaOngkir'], $value['hargaJasa'], $hargaTotal, $value['kodeUnik'], $value['gambarBarang'], $value['idTrip'], $value['kota_awal'], $value['kota_tujuan'], $value['waktuAwal'], $value['waktuAkhir'], null);
		}
		return $result;
	}
	public function getTracking4($nama)
	{
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT himpB.idUser1, himpB.idTrip, himpB.idUser2, himpB.hargaBarang, himpB.hargaOngkir, himpB.hargaJasa, himpB.namaBarang, himpB.deskripsiBarang, himpB.gambarBarang, himpB.kodeUnik,himpB.idKota2,himpB.waktuAwal, himpB.waktuAkhir, himpB.kota_awal, kota.namaKota as 'kota_tujuan', himpB.noresi
			FROM kota inner join (SELECT himpA.idUser1, himpA.idTrip, himpA.idUser2, himpA.hargaBarang, himpA.hargaOngkir, himpA.hargaJasa, himpA.namaBarang, himpA.deskripsiBarang, himpA.gambarBarang, himpA.kodeUnik,himpA.idKota2,himpA.waktuAwal, himpA.waktuAkhir, kota.namaKota as 'kota_awal', himpA.noresi
						FROM kota inner join (SELECT  idUser1, transaksi.idTrip, idUser2, hargaBarang ,hargaOngkir, hargaJasa, namaBarang, deskripsiBarang,gambarBarang, kodeUnik,idKota1, idKota2,waktuAwal, waktuAkhir, noresi
											FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
											WHERE idUser2 = $idUser AND statusBarang = 'orderSent') as himpA on kota.idKota = himpA.idKota1) as himpB  on kota.idKota = himpB.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$hargaTotal = $value['hargaBarang'] + $value['hargaOngkir'] + $value['hargaJasa'];
			$result[] = new Tracking($value['namaBarang'], $value['deskripsiBarang'], $value['hargaBarang'], $value['hargaOngkir'], $value['hargaJasa'], $hargaTotal, $value['kodeUnik'], $value['gambarBarang'], $value['idTrip'], $value['kota_awal'], $value['kota_tujuan'], $value['waktuAwal'], $value['waktuAkhir'], $value['noresi']);
		}
		return $result;
	}

	public function getTracking5($nama)
	{
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT himpB.idUser1, himpB.idTrip, himpB.idUser2, himpB.hargaBarang, himpB.hargaOngkir, himpB.hargaJasa, himpB.namaBarang, himpB.deskripsiBarang, himpB.gambarBarang, himpB.kodeUnik,himpB.idKota2,himpB.waktuAwal, himpB.waktuAkhir, himpB.kota_awal, kota.namaKota as 'kota_tujuan'
				FROM kota inner join (SELECT himpA.idUser1, himpA.idTrip, himpA.idUser2, himpA.hargaBarang, himpA.hargaOngkir, himpA.hargaJasa, himpA.namaBarang, himpA.deskripsiBarang, himpA.gambarBarang, himpA.kodeUnik,himpA.idKota2,himpA.waktuAwal, himpA.waktuAkhir, kota.namaKota as 'kota_awal'
							FROM kota inner join (SELECT  idUser1, transaksi.idTrip, idUser2, hargaBarang ,hargaOngkir, hargaJasa, namaBarang, deskripsiBarang,gambarBarang, kodeUnik,idKota1, idKota2,waktuAwal, waktuAkhir
												FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
												WHERE idUser2 = '$idUser' AND statusBarang = 'transactionComplete') as himpA on kota.idKota = himpA.idKota1) as himpB  on kota.idKota = himpB.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$hargaTotal = $value['hargaBarang'] + $value['hargaOngkir'] + $value['hargaJasa'];
			$result[] = new Tracking($value['namaBarang'], $value['deskripsiBarang'], $value['hargaBarang'], $value['hargaOngkir'], $value['hargaJasa'], $hargaTotal, $value['kodeUnik'], $value['gambarBarang'], $value['idTrip'], $value['kota_awal'], $value['kota_tujuan'], $value['waktuAwal'], $value['waktuAkhir'], null);
		}
		return $result;
	}



	public function view_trackingTraveller()
	{
		$nama = $_SESSION['nama'];
		$result1 = $this->getTrackingTraveller1($nama);
		$result2 = $this->getTrackingTraveller2($nama);
		$result3 = $this->getTrackingTraveller3($nama);
		$result4 = $this->getTrackingTraveller4($nama);
		$result5 = $this->getTrackingTraveller5($nama);
		return view::createView('trackingTraveller.php', ["nama" => $nama, "result1" => $result1, "result2" => $result2, "result3" => $result3, "result4" => $result4, "result5" => $result5]);
	}

	public function getTrackingTraveller1($nama)
	{
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT himpB.idUser1, himpB.idTrip, himpB.idUser2, himpB.hargaBarang, himpB.hargaOngkir, himpB.hargaJasa, himpB.namaBarang, himpB.deskripsiBarang, himpB.gambarBarang, himpB.kodeUnik,himpB.idKota2,himpB.waktuAwal, himpB.waktuAkhir, himpB.kota_awal, kota.namaKota as 'kota_tujuan'
		FROM kota inner join (SELECT himpA.idUser1, himpA.idTrip, himpA.idUser2, himpA.hargaBarang, himpA.hargaOngkir, himpA.hargaJasa, himpA.namaBarang, himpA.deskripsiBarang, himpA.gambarBarang, himpA.kodeUnik,himpA.idKota2,himpA.waktuAwal, himpA.waktuAkhir, kota.namaKota as 'kota_awal'
					FROM kota inner join (SELECT  idUser1, transaksi.idTrip, idUser2, hargaBarang ,hargaOngkir, hargaJasa, namaBarang, deskripsiBarang,gambarBarang, kodeUnik,idKota1, idKota2,waktuAwal, waktuAkhir
										FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
										WHERE idUser1 = $idUser AND statusBarang = 'onDelivery') as himpA on kota.idKota = himpA.idKota1) as himpB  on kota.idKota = himpB.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$hargaTotal = $value['hargaBarang'] + $value['hargaOngkir'] + $value['hargaJasa'];
			$result[] = new Tracking($value['namaBarang'], $value['deskripsiBarang'], $value['hargaBarang'], $value['hargaOngkir'], $value['hargaJasa'], $hargaTotal, $value['kodeUnik'], $value['gambarBarang'], $value['idTrip'], $value['kota_awal'], $value['kota_tujuan'], $value['waktuAwal'], $value['waktuAkhir'], null);
		}
		return $result;
	}
	public function getTrackingTraveller2($nama)
	{
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT himpB.idUser1, himpB.idTrip, himpB.idUser2, himpB.hargaBarang, himpB.hargaOngkir, himpB.hargaJasa, himpB.namaBarang, himpB.deskripsiBarang, himpB.gambarBarang, himpB.kodeUnik,himpB.idKota2,himpB.waktuAwal, himpB.waktuAkhir, himpB.kota_awal, kota.namaKota as 'kota_tujuan'
		FROM kota inner join (SELECT himpA.idUser1, himpA.idTrip, himpA.idUser2, himpA.hargaBarang, himpA.hargaOngkir, himpA.hargaJasa, himpA.namaBarang, himpA.deskripsiBarang, himpA.gambarBarang, himpA.kodeUnik,himpA.idKota2,himpA.waktuAwal, himpA.waktuAkhir, kota.namaKota as 'kota_awal'
					FROM kota inner join (SELECT  idUser1, transaksi.idTrip, idUser2, hargaBarang ,hargaOngkir, hargaJasa, namaBarang, deskripsiBarang,gambarBarang, kodeUnik,idKota1, idKota2,waktuAwal, waktuAkhir
										FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
										WHERE idUser1 = $idUser AND statusBarang = 'onDeliveryToIndo') as himpA on kota.idKota = himpA.idKota1) as himpB  on kota.idKota = himpB.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$hargaTotal = $value['hargaBarang'] + $value['hargaOngkir'] + $value['hargaJasa'];
			$result[] = new Tracking($value['namaBarang'], $value['deskripsiBarang'], $value['hargaBarang'], $value['hargaOngkir'], $value['hargaJasa'], $hargaTotal, $value['kodeUnik'], $value['gambarBarang'], $value['idTrip'], $value['kota_awal'], $value['kota_tujuan'], $value['waktuAwal'], $value['waktuAkhir'], null);
		}
		return $result;
	}
	public function getTrackingTraveller3($nama)
	{
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT himpB.idUser1, himpB.idTrip, himpB.idUser2, himpB.hargaBarang, himpB.hargaOngkir, himpB.hargaJasa, himpB.namaBarang, himpB.deskripsiBarang, himpB.gambarBarang, himpB.kodeUnik,himpB.idKota2,himpB.waktuAwal, himpB.waktuAkhir, himpB.kota_awal, kota.namaKota as 'kota_tujuan'
		FROM kota inner join (SELECT himpA.idUser1, himpA.idTrip, himpA.idUser2, himpA.hargaBarang, himpA.hargaOngkir, himpA.hargaJasa, himpA.namaBarang, himpA.deskripsiBarang, himpA.gambarBarang, himpA.kodeUnik,himpA.idKota2,himpA.waktuAwal, himpA.waktuAkhir, kota.namaKota as 'kota_awal'
					FROM kota inner join (SELECT  idUser1, transaksi.idTrip, idUser2, hargaBarang ,hargaOngkir, hargaJasa, namaBarang, deskripsiBarang,gambarBarang, kodeUnik,idKota1, idKota2,waktuAwal, waktuAkhir
										FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
										WHERE idUser1 = $idUser AND statusBarang = 'arrivedInIndo') as himpA on kota.idKota = himpA.idKota1) as himpB  on kota.idKota = himpB.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$hargaTotal = $value['hargaBarang'] + $value['hargaOngkir'] + $value['hargaJasa'];
			$result[] = new Tracking($value['namaBarang'], $value['deskripsiBarang'], $value['hargaBarang'], $value['hargaOngkir'], $value['hargaJasa'], $hargaTotal, $value['kodeUnik'], $value['gambarBarang'], $value['idTrip'], $value['kota_awal'], $value['kota_tujuan'], $value['waktuAwal'], $value['waktuAkhir'], null);
		}
		return $result;
	}
	public function getTrackingTraveller4($nama)
	{
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT himpB.idUser1, himpB.idTrip, himpB.idUser2, himpB.hargaBarang, himpB.hargaOngkir, himpB.hargaJasa, himpB.namaBarang, himpB.deskripsiBarang, himpB.gambarBarang, himpB.kodeUnik,himpB.idKota2,himpB.waktuAwal, himpB.waktuAkhir, himpB.kota_awal, kota.namaKota as 'kota_tujuan'
		FROM kota inner join (SELECT himpA.idUser1, himpA.idTrip, himpA.idUser2, himpA.hargaBarang, himpA.hargaOngkir, himpA.hargaJasa, himpA.namaBarang, himpA.deskripsiBarang, himpA.gambarBarang, himpA.kodeUnik,himpA.idKota2,himpA.waktuAwal, himpA.waktuAkhir, kota.namaKota as 'kota_awal'
					FROM kota inner join (SELECT  idUser1, transaksi.idTrip, idUser2, hargaBarang ,hargaOngkir, hargaJasa, namaBarang, deskripsiBarang,gambarBarang, kodeUnik,idKota1, idKota2,waktuAwal, waktuAkhir
										FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
										WHERE idUser1 = $idUser AND statusBarang = 'orderSent') as himpA on kota.idKota = himpA.idKota1) as himpB  on kota.idKota = himpB.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$hargaTotal = $value['hargaBarang'] + $value['hargaOngkir'] + $value['hargaJasa'];
			$result[] = new Tracking($value['namaBarang'], $value['deskripsiBarang'], $value['hargaBarang'], $value['hargaOngkir'], $value['hargaJasa'], $hargaTotal, $value['kodeUnik'], $value['gambarBarang'], $value['idTrip'], $value['kota_awal'], $value['kota_tujuan'], $value['waktuAwal'], $value['waktuAkhir'], null);
		}
		return $result;
	}
	public function getTrackingTraveller5($nama)
	{
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT himpB.idUser1, himpB.idTrip, himpB.idUser2, himpB.hargaBarang, himpB.hargaOngkir, himpB.hargaJasa, himpB.namaBarang, himpB.deskripsiBarang, himpB.gambarBarang, himpB.kodeUnik,himpB.idKota2,himpB.waktuAwal, himpB.waktuAkhir, himpB.kota_awal, kota.namaKota as 'kota_tujuan'
		FROM kota inner join (SELECT himpA.idUser1, himpA.idTrip, himpA.idUser2, himpA.hargaBarang, himpA.hargaOngkir, himpA.hargaJasa, himpA.namaBarang, himpA.deskripsiBarang, himpA.gambarBarang, himpA.kodeUnik,himpA.idKota2,himpA.waktuAwal, himpA.waktuAkhir, kota.namaKota as 'kota_awal'
					FROM kota inner join (SELECT  idUser1, transaksi.idTrip, idUser2, hargaBarang ,hargaOngkir, hargaJasa, namaBarang, deskripsiBarang,gambarBarang, kodeUnik,idKota1, idKota2,waktuAwal, waktuAkhir
										FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
										WHERE idUser1 = $idUser AND statusBarang = 'transactionComplete') as himpA on kota.idKota = himpA.idKota1) as himpB  on kota.idKota = himpB.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$hargaTotal = $value['hargaBarang'] + $value['hargaOngkir'] + $value['hargaJasa'];
			$result[] = new Tracking($value['namaBarang'], $value['deskripsiBarang'], $value['hargaBarang'], $value['hargaOngkir'], $value['hargaJasa'], $hargaTotal, $value['kodeUnik'], $value['gambarBarang'], $value['idTrip'], $value['kota_awal'], $value['kota_tujuan'], $value['waktuAwal'], $value['waktuAkhir'], null);
		}
		return $result;
	}

	public function statusTracking()
	{
		$nama = $_SESSION['nama'];
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];
		$namaBarang = $_POST['namaBarang'];
		if ($_POST['pesananDiproses'] != null) {
			$query = "UPDATE `transaksi` SET `statusBarang` = 'onDelivery' WHERE `idUser1` = '$idUser' AND `namaBarang` = '$namaBarang' ";
			$query_result = $this->db->executeNonSelectQuery($query);
		} else if ($_POST['pesananKirimKeIndo'] != null) {
			$query = "UPDATE `transaksi` SET `statusBarang` = 'onDeliveryToIndo' WHERE `idUser1` = '$idUser' AND `namaBarang` = '$namaBarang' ";
			$query_result = $this->db->executeNonSelectQuery($query);
		} else if ($_POST['pesananTibaDiIndo'] != null) {
			$query = "UPDATE `transaksi` SET `statusBarang` = 'arrivedInIndo' WHERE `idUser1` = '$idUser' AND `namaBarang` = '$namaBarang' ";
			$query_result = $this->db->executeNonSelectQuery($query);
		} else if ($_POST['pesananDikirim'] != null) {
			$noresi = $_POST['noresi'];
			$query = "UPDATE `transaksi` SET `statusBarang` = 'orderSent', `noresi` = '$noresi'  WHERE `idUser1` = '$idUser' AND `namaBarang` = '$namaBarang' ";
			$query_result = $this->db->executeNonSelectQuery($query);
		} else if ($_POST['pesananDiterima'] != null) {
			$query = "UPDATE `transaksi` SET `statusBarang` = 'transactionComplete' WHERE `idUser1` = '$idUser' AND `namaBarang` = '$namaBarang' ";
			$query_result = $this->db->executeNonSelectQuery($query);
		}
	}

	public function getProfileTraveller($nama)
	{
		$query = "SELECT himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota 
			as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
			FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota ) 
			as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip 
			inner join user on user.idUser= post.idUser WHERE user.namaUser = '$nama' ";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new Trip(null, null, null, $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan']);
		}
		return $result;
	}
	public function getProfileTravellerMarket($nama)
	{
		$query = "SELECT * from user where namaUser = '$nama' ";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new user($value['idUser'], $value['namaUser'], $value['password'], $value['alamat'], $value['nohp'], $value['email'], $value['swafoto'], $value['gambarKTP'], $value['namaBank'], $value['norek'], $value['noKTP'], $value['gambarProfile']);
		}
		return $result;
	}

	public function getTripSendiri()
	{
		$nama = $_SESSION['nama'];
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');

		$query = "SELECT himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota 
			as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
			FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota ) 
			as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip 
			inner join user on user.idUser= post.idUser WHERE user.namaUser like '$nama' ";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			if ($value['waktuAkhir'] > $now) {
				$result[] = new Trip(null, null, $value['idTrip'], $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan']);
			}
		}
		return $result;
	}

	public function getTripSendiriOffer()
	{
		$nama = $_SESSION['nama'];

		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');

		$query = "SELECT himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota 
			as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
			FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota ) 
			as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip 
			inner join user on user.idUser= post.idUser WHERE user.namaUser like '$nama' ";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			if ($value['waktuAkhir'] > $now) {
				$result[] = new Trip(null, null, $value['idTrip'], $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan']);
			}
		}
		return $result;
	}

	public function getProfileSendiri()
	{
		$nama = $_SESSION['nama'];
		$query = "SELECT namaUser,email,nohp,alamat FROM user WHERE namaUser like '$nama' ";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new user(null, $value['namaUser'], null, $value['alamat'], $value['nohp'], $value['email'], null, null, null, null, null, null);
		}
		return $result;
	}

	public function getFotoProfile()
	{
		$nama = $_SESSION['nama'];
		$query = "SELECT gambarProfile FROM user WHERE namaUser LIKE '$nama'";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new user(null, null, null, null, null, null, null, null, null, null, null, $value['gambarProfile']);
		}
		return $result;
	}


	public function getTraveller()
	{
		$query = "SELECT user.namaUser, himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota 
			as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
			FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota WHERE statusTrip = 'verified') 
			as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip 
			inner join user on user.idUser= post.idUser";

		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$dateAwal = new DateTime($value['waktuAwal']);
			$dateAkhir = new DateTime($value['waktuAkhir']);
			$timezone = new DateTimeZone('Asia/Jakarta');
			$date = new DateTime("now");
			$date->setTimeZone($timezone);


			if ($dateAwal > $date) {
				$result[] = new Trip($value['namaUser'], null, null, $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan'], null);
			}
		}
		return $result;
	}

	public function login()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$kondisi = false;

		if (isset($email) && isset($password) && $email != "" && $password != "") {
			$query = "SELECT * FROM `user` WHERE `email` LIKE '$email' AND `password` LIKE '$password' ";
			$query_result = $this->db->executeSelectQuery($query);
			if ($query_result[0] != null) {
				$kondisi = true;
				$_SESSION['email'] = $query_result[0]['email'];
				$_SESSION['password'] = $query_result[0]['password'];
				$_SESSION['nama'] = $query_result[0]['namaUser'];
				$_SESSION['noHp'] = $query_result[0]['nohp'];
				$_SESSION['alamat'] = $query_result[0]['alamat'];
				$_SESSION['auth'] = 1;
			} else {
				$_SESSION['auth'] = 0;
			}
		}
		return $kondisi;
	}

	public function logout()
	{
		session_unset();
		session_destroy();
	}


	public function register()
	{
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$nohp = $_POST['noHp'];
		$alamat = $_POST['alamat'];
		$kelurahan = $_POST['kelurahan'];
		$kecamatan = $_POST['kecamatan'];
		$kota = $_POST['kota'];
		$provinsi = $_POST['provinsi'];

		$queryNegara = "SELECT * FROM `negara` WHERE `namaNegara` LIKE 'Indonesia'";
		$queryNegara_result = $this->db->executeSelectQuery($queryNegara);
		if ($queryNegara_result[0]['idNegara'] == NULL) {
			$query = "INSERT INTO negara(namaNegara) VALUES('Indonesia')";
			$query_result = $this->db->executeNonSelectQuery($queryNegara);
		}
		$fk_negara = $queryNegara_result[0]['idNegara'];
		$queryProvinsi = "SELECT `idProvinsi`, `namaProvinsi` FROM `provinsi` WHERE `namaProvinsi` LIKE '$provinsi' ";
		$queryProvinsi_result = $this->db->executeSelectQuery($queryProvinsi);
		if ($queryProvinsi_result[0]['idProvinsi'] == null) {
			$query = "INSERT INTO provinsi(namaProvinsi,idNegara) VALUES ('$provinsi','$fk_negara')";
			$query_result = $this->db->executeNonSelectQuery($query);
		}

		$queryProvinsi2 = "SELECT `idProvinsi`, `namaProvinsi` FROM `provinsi` WHERE `namaProvinsi` LIKE '$provinsi' ";
		$queryProvinsi_result2 = $this->db->executeSelectQuery($queryProvinsi2);

		$fk_provinsi = $queryProvinsi_result2[0]['idProvinsi'];
		$queryKota = "SELECT `idKota`,`namaKota` FROM `kota` WHERE `namaKota` LIKE '$kota' ";
		$queryKota_result = $this->db->executeSelectQuery($queryKota);
		if ($queryKota_result[0]['idKota'] == null) {
			$query = "INSERT INTO kota(namaKota,idProvinsi) VALUES ('$kota','$fk_provinsi')";
			$query_result = $this->db->executeNonSelectQuery($query);
		}


		$queryKota2 = "SELECT `idKota`,`namaKota` FROM `kota` WHERE `namaKota` LIKE '$kota' ";
		$queryKota_result2 = $this->db->executeSelectQuery($queryKota2);

		$fk_kota = $queryKota_result2[0]['idKota'];
		$queryKecamatan = "SELECT `idKecamatan`, `namaKecamatan` FROM `kecamatan` WHERE `namaKecamatan` LIKE '$kecamatan'";
		$queryKecamatan_result = $this->db->executeSelectQuery($queryKecamatan);
		if ($queryKecamatan_result[0]['idKecamatan'] == null) {
			$query = "INSERT INTO kecamatan(namaKecamatan,idKota) VALUES('$kecamatan','$fk_kota')";
			$query_result = $this->db->executeNonSelectQuery($query);
		}

		$queryKecamatan2 = "SELECT `idKecamatan`, `namaKecamatan` FROM `kecamatan` WHERE `namaKecamatan` LIKE '$kecamatan'";
		$queryKecamatan_result2 = $this->db->executeSelectQuery($queryKecamatan2);

		$fk_kecamatan = $queryKecamatan_result2[0]['idKecamatan'];
		$queryKelurahan = "SELECT `idKelurahan`,`namaKelurahan` FROM `kelurahan` WHERE `namaKelurahan` LIKE '$kelurahan'";
		$queryKelurahan_result = $this->db->executeSelectQuery($queryKelurahan);
		if ($queryKelurahan_result[0]['idKelurahan'] == null) {
			$query = "INSERT INTO kelurahan(namaKelurahan,idKecamatan) VALUES ('$kelurahan','$fk_kecamatan')";
			$query_result = $this->db->executeNonSelectQuery($query);
		}

		$queryKelurahan2 = "SELECT `idKelurahan`,`namaKelurahan` FROM `kelurahan` WHERE `namaKelurahan` LIKE '$kelurahan'";
		$queryKelurahan_result2 = $this->db->executeSelectQuery($queryKelurahan2);

		$fk_kelurahan = $queryKelurahan_result2[0]['idKelurahan'];
		$query = "INSERT INTO user (namaUser,email,password,nohp,alamat,rating,isTraveller,gambarKTP,swafoto,norek,noKTP,idKelurahan) 
				VALUES ('$nama','$email','$password','$nohp','$alamat',null,null,null,null,null,null,'$fk_kelurahan')";
		$query_result = $this->db->executeNonSelectQuery($query);
		$_SESSION['nama'] = $nama;
	}

	public function hapusAkun()
	{
		$nama = $_SESSION['nama'];
		$query = "DELETE FROM user WHERE `namaUser` LIKE '$nama' ";
		$query_result = $this->db->executeNonSelectQuery($query);
	}

	public function updatePass()
	{
		$nama = $_SESSION['nama'];
		$password = $_POST['password'];
		$passwordBaru = $_POST['PasswordBaru'];
		$query = "UPDATE `user` 
				SET `password` = '$passwordBaru' 
				WHERE `namaUser` LIKE '$nama' AND `password` LIKE '$password' ";
		$query_result = $this->db->executeNonSelectQuery($query);
		$_SESSION['password'] = $passwordBaru;
	}
	// UPDATE `user` SET `password`= 12345678 WHERE `namaUser` LIKE 'quadratnp@gmail.com' AND `password` LIKE '1234567878'

	public function lengkapPendaftaran()
	{
		$nama = $_SESSION['nama'];
		$nik = $_POST['nik'];
		$namabank = $_POST['namaBank'];
		$norek = $_POST['noRek'];
		$fotoktp = $_FILES['fotoKTP']['name'];
		$fotoselfie = $_FILES['fotoSelfie']['name'];

		$oldnamektp = $_FILES['fotoKTP']['tmp_name'];
		$newnamektp = dirname(__DIR__) . "\\view\image\\" . $fotoktp;
		move_uploaded_file($oldnamektp, $newnamektp);

		$oldnameselfie = $_FILES['fotoSelfie']['tmp_name'];
		$newnameselfie = dirname(__DIR__) . "\\view\image\\" . $fotoselfie;
		move_uploaded_file($oldnameselfie, $newnameselfie);

		$query_namaBank = "SELECT * FROM `bank` WHERE `namaBank` LIKE '$namabank' ";
		$query_namaBank_result = $this->db->executeSelectQuery($query_namaBank);
		$idBank = $query_namaBank_result[0]['idBank'];

		$query = "UPDATE `user` 
				SET `isTraveller` = 'pending', `gambarKTP` = '$fotoktp', `swafoto` = '$fotoselfie', `namaBank` = '$idBank', `norek` = '$norek', `noKTP` = '$nik'
				WHERE `namaUser` LIKE '$nama'";
		$query_result = $this->db->executeNonSelectQuery($query);



		if ($_FILES["fotoKTP"]["size"] > 10000000) {
			echo "Maaf, file anda melebihi batas.";
			$uploadOk = 0;
		}

		if ($_FILES["fotoSelfie"]["size"] > 10000000) {
			echo "Maaf, file anda melebihi batas.";
			$uploadOk = 0;
		}

		$query_idUser = "SELECT idUser FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');

		$queryNotifikasi = "INSERT INTO notifikasi VALUES('$idUser',null, 'Verifikasi Pending','Kelengkapan profil anda sedang diproses',0,'$now')";
		$queryNotifikasi_result = $this->db->executeNonSelectQuery($queryNotifikasi);
	}

	public function cekMelengkapiPendaftaran($nama)
	{
		$lengkap = 0;
		if ($nama != null) {
			$query = "SELECT isTraveller FROM user WHERE namaUser LIKE '$nama'";

			$query_result = $this->db->executeSelectQuery($query);

			if ($query_result[0]['isTraveller'] == 'verified') {
				$lengkap = 1;
			} else if ($query_result[0]['isTraveller'] == 'pending') {
				$lengkap = 2;
			}
		}
		return $lengkap;
	}

	public function updateProfileUser()
	{
		$nama = $_SESSION['nama'];


		$nama1 = $_POST['updateNama'];
		$telepon1 = $_POST['updateTelepon'];
		$email1 = $_POST['updateEmail'];
		$alamat1 = $_POST['updateAlamat'];
		$foto = $_FILES['updateFoto']['name'];


		$oldnameprofile = $_FILES['updateFoto']['tmp_name'];
		$newnameprofile = dirname(__DIR__) . "\\view\image\\" . $foto;
		move_uploaded_file($oldnameprofile, $newnameprofile);

		$query = "UPDATE `user` 
				SET `namaUser`='$nama1',`email`='$email1',`nohp`='$telepon1',`alamat`='$alamat1' , `gambarProfile`='$foto'
				WHERE `namaUser` like '$nama' ";
		$query_result = $this->db->executeNonSelectQuery($query);
		$_SESSION['nama'] = $nama1;
	}

	public function getPencarian()
	{
		$negara = $_GET['country'];

		$query = "select namaUser, idTrip, gambarTrip, waktuAwal, waktuAkhir, kota_awal, kota_tujuan
		from(SELECT user.namaUser, himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota 
					as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
					FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota WHERE statusTrip = 'verified') 
					as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip 
					inner join user on user.idUser= post.idUser) as himpAA
					inner join (SELECT idKota, namaKota
								from(SELECT idProvinsi
									 from negara inner join provinsi 
									 on provinsi.idNegara = negara.idNegara 
									 where namaNegara = '$negara') as himpP inner join kota on himpP.idProvinsi = kota.idProvinsi
								) as himpAB on himpAA.kota_tujuan = himpAB.namaKota";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new Trip($value['namaUser'], null, null, $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan'], null);
		}
		return $result;
	}

	public function getPencarianOffer()
	{
		$negara = $_GET['country'];

		$query = "select himpA.idUser1, hargaBarang, namaBarang, gambarBarang, waktuAwal, waktuAkhir
		from (select idUser1, hargaBarang, namaBarang, gambarBarang, trip.idKota2, trip.waktuAwal, trip.waktuAkhir
			 from transaksi inner join trip 
			 on transaksi.IdTrip = trip.idTrip 
			 where transaksi.statusBarang = 'onMarketOffer') as himpA
		inner join (SELECT idKota, namaKota
										from(SELECT idProvinsi
											 from negara inner join provinsi 
											 on provinsi.idNegara = negara.idNegara 
											 where namaNegara = '$negara') as himpP inner join kota on himpP.idProvinsi = kota.idProvinsi
										) as himpB on himpA.idKota2 = himpB.idKota";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');
		foreach ($query_result as $key => $value) {
			if ($value['waktuAkhir'] > $now) {
				$result[] = new transaksi($value['idUser1'], null, null, null, $value['hargaBarang'], null, null, $value['namaBarang'], null, null, $value['gambarBarang'], null, null);
			}
		}
		return $result;
	}

	public function getKategori()
	{
		$query = "SELECT * FROM kategori";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new Kategori($value['idKategori'], $value['namaKategori']);
		}
		return $result;
	}

	public function getOffer()
	{
		$query = "SELECT * FROM transaksi inner join trip on transaksi.idTrip = trip.idTrip 
		WHERE transaksi.statusBarang LIKE 'onMarketOffer'";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');
		foreach ($query_result as $key => $value) {
			if ($value['waktuAkhir'] > $now) {
				$result[] = new transaksi($value['idUser1'], null, null, null, $value['hargaBarang'], null, null, $value['namaBarang'], null, null, $value['gambarBarang'], null, null);
			}
		}
		return $result;
	}

	public function getWanted()
	{
		$query = "SELECT * FROM transaksi WHERE statusBarang LIKE 'onMarketWanted'";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new transaksi($value['idUser1'], null, null, null, null, null, null, $value['namaBarang'], null, null, $value['gambarBarang'], null, null);
		}
		return $result;
	}

	public function insertBarangOffer()
	{
		$nama = $_SESSION['nama'];
		$idTrip = $_POST['trip'];
		$namaBarang = $_POST['namaBarang'];
		$kategori = $_POST['kartegoriBarang'];
		$hargaDiJual = $_POST['hargaDiJual'];
		$hargaTotal = $_POST['totalHarga'];
		$hargaJasa = $hargaTotal - $hargaDiJual;
		$deskripsiBarang = $_POST['deskripsiBarang'];
		$gambar = $_FILES['gambar']['name'];
		$idKategori = $_POST['kategori'];

		$oldnamegambar = $_FILES['gambar']['tmp_name'];
		$newnamegambar = dirname(__DIR__) . "\\view\image\market\\" . $gambar;
		move_uploaded_file($oldnamegambar, $newnamegambar);

		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);

		$fk_idUser = $query_idUser_result[0]['idUser'];

		$query = "INSERT INTO transaksi(idUser1,idTrip,idUser2,jumlahBarang,hargaBarang,hargaOngkir,hargaJasa,namaBarang,statusBarang,deskripsiBarang,gambarBarang,noresi,idKategori) 
		VALUES ('$fk_idUser','$idTrip',null,null,'$hargaDiJual',null,'$hargaJasa','$namaBarang','onPending','$deskripsiBarang','$gambar',null,$idKategori)";
		$query_result = $this->db->executeNonSelectQuery($query);

		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');

		$query_notifikasi = "INSERT INTO Notifikasi VALUES ('$fk_idUser',null,'Verifikasi Pending', 'Offer an Item Anda dengan nama $namaBarang sedang diproses', 0, '$now')";
		$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi);
	}

	public function insertBarangWanted()
	{
		$nama = $_SESSION['nama'];
		$namaBarang = $_POST['nama'];
		$jumlah = $_POST['jumlah'];
		$deskripsi = $_POST['deskripsi'];
		$idkategori = $_POST['kategori'];
		$gambar = $_FILES['gambar']['name'];

		$oldnamegambar = $_FILES['gambar']['tmp_name'];
		$newnamegambar = dirname(__DIR__) . "\\view\image\market\\" . $gambar;
		move_uploaded_file($oldnamegambar, $newnamegambar);

		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);

		$fk_idUser = $query_idUser_result[0]['idUser'];

		$query = "INSERT INTO transaksi(idUser1,idTrip,idUser2,jumlahBarang,hargaBarang,hargaOngkir,hargaJasa,namaBarang,statusBarang,deskripsiBarang,gambarBarang,noresi,idKategori) 
		VALUES ('$fk_idUser',null,null,'$jumlah',null,null,null,'$namaBarang','onPendingWanted','$deskripsi','$gambar',null,$idkategori)";
		$query_result = $this->db->executeNonSelectQuery($query);

		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');

		$query_notifikasi = "INSERT INTO Notifikasi VALUES ('$fk_idUser',null,'Verifikasi Pending', 'Wanted Item Anda dengan nama $namaBarang sedang diproses', 0, '$now')";
		$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi);
	}

	public function getNotifikasi()
	{
		$nama = $_SESSION['nama'];
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);

		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT * FROM notifikasi WHERE idUser = '$idUser'";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new notifikasi(null, null, $value['namaNotifikasi'], $value['deskripsi'], null, $value['dateTime']);
		}
		return $result;
	}

	public function getDetailBarangMarket($namaBarang, $idUser)
	{
		$query = "SELECT user.namaUser, user.nohp, user.alamat, user.gambarProfile, jumlahBarang, namaBarang, statusBarang, deskripsiBarang, gambarBarang, namaKategori
		FROM (SELECT idUser1, jumlahBarang, namaBarang, statusBarang, deskripsiBarang, gambarBarang, namaKategori FROM transaksi inner join kategori on transaksi.idKategori = kategori.idKategori 
				WHERE transaksi.namaBarang LIKE '$namaBarang' AND transaksi.statusBarang LIKE 'onMarketWanted' AND transaksi.idUser1='$idUser') as himpA
				inner join user on himpA.idUser1 = user.idUser";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new Wanted($value['namaUser'], $value['nohp'], $value['alamat'], $value['gambarProfile'], $value['namaBarang'], $value['statusBarang'], $value['deskripsiBarang'], $value['namaKategori'], $value['gambarBarang'], $value['jumlahBarang']);
		}
		return $result;
	}

	public function getDetailBarangOffer($namaBarang, $idUser)
	{
		$query = "SELECT kotaAwal, namaKota, namaBarang, deskripsiBarang, statusBarang, hargaBarang, gambarBarang, namaKategori, waktuAkhir, waktuAwal, namaUser,  nohp, alamat, gambarProfile
		FROM(SELECT idKota2, namaKota as 'kotaAwal', namaBarang, deskripsiBarang, statusBarang, hargaBarang, gambarBarang, namaKategori, waktuAwal, waktuAkhir, namaUser,  nohp, alamat, gambarProfile
				from(select idKota1, idKota2, waktuAwal, waktuAkhir, namaBarang, deskripsiBarang, statusBarang, hargaBarang, gambarBarang, namaKategori, namaUser,  nohp, alamat, gambarProfile
						from (SELECT  user.namaUser, user.nohp, user.alamat, user.gambarProfile, IdTrip, transaksi.idKategori, namaBarang, deskripsiBarang, statusBarang, hargaBarang, gambarBarang, kategori.namaKategori
								FROM transaksi inner join kategori on transaksi.idKategori = kategori.idKategori inner join user on transaksi.idUser1 = user.idUser
								where transaksi.idUser1 = '$idUser' AND transaksi.statusBarang = 'onMarketOffer' AND transaksi.namaBarang = '$namaBarang') as himpA
						inner join trip where trip.idTrip = himpA.idTrip) as himpB
				 inner join kota on kota.idKota = himpB.idKota1)as himpC
		inner join kota on kota.idKota = himpC.idKota2";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$awal = $value['waktuAwal'];
			$sec = strtotime($awal);
			$newAwal = date("d/m/yy", $sec);
			$akhir = $value['waktuAkhir'];
			$ces = strtotime($akhir);
			$newAkhir = date("d/m/yy", $ces);
			$result[] = new Offer($value['namaUser'], $value['nohp'], $value['alamat'], $value['gambarProfile'], $value['kotaAwal'], $value['namaKota'], $newAwal, $newAkhir, $value['namaBarang'], $value['statusBarang'], $value['deskripsiBarang'], $value['namaKategori'], $value['hargaBarang'], $value['gambarBarang']);
		}
		return $result;
	}

	public function getWantedSendiri()
	{
		$nama = $_SESSION['nama'];
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);

		$idUser = $query_idUser_result[0]['idUser'];
		$query = "SELECT idUser1, namaBarang from transaksi where idUser1 = '$idUser' AND statusBarang = 'onMarketWanted'";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new Barang($value['idUser1'], null, null, $value['namaBarang'], null);
		}
		return $result;
	}

	public function getOfferSendiri()
	{
		$nama = $_SESSION['nama'];
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);

		$idUser = $query_idUser_result[0]['idUser'];
		$query = "SELECT idUser1, namaBarang from transaksi where idUser1 = '$idUser' AND statusBarang = 'onMarketOffer'";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new Barang($value['idUser1'], null, null, $value['namaBarang'], null);
		}
		return $result;
	}

	public function getBeliBarangOffer()
	{
		$namaBarang = $_GET['namaBarang'];
		$hargaBarang = $_GET['hargaBarang'];
		$namaKategori = $_GET['namaKategori'];
		$kotaAwal = $_GET['kotaAwal'];
		$kotaTujuan = $_GET['kotaTujuan'];
		$waktuAwal = $_GET['waktuAwal'];
		$waktuAkhir = $_GET['waktuAkhir'];
		$deskripsi = $_GET['deskripsi'];
		$gambar = $_GET['gambar'];
		$namaUser = $_GET['namaUser'];
		$nohp = $_GET['nohp'];
		$alamat = $_GET['alamat'];
		$result = [];
		$result[] = new Offer($namaUser, $nohp, $alamat, null, $kotaAwal, $kotaTujuan, $waktuAwal, $waktuAkhir, $namaBarang, null, $deskripsi, $namaKategori, $hargaBarang, $gambar);
		return $result;
	}

	public function getBeliBarangWanted()
	{
		$namaBarang = $_GET['namaBarang'];
		$jumlahBarang = $_GET['jumlahBarang'];
		$namaKategori = $_GET['namaKategori'];
		$deskripsi = $_GET['deskripsi'];
		$gambar = $_GET['gambar'];
		$namaUser = $_GET['namaUser'];
		$nohp = $_GET['nohp'];
		$alamat = $_GET['alamat'];
		$result = [];
		$result[] = new Wanted($namaUser, $nohp, $alamat, null, $namaBarang, null, $deskripsi, $namaKategori, $gambar, $jumlahBarang);
		return $result;
	}

	public function inserBarangOfferPersetujuan()
	{
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');
		$namaBarang = $_POST['namaBarang'];
		$namaKategori = $_POST['namaKategori'];
		$hargaDiJual = $_POST['hargaDiJual'];
		$hargaOngkir = $_POST['hargaOngkir'];
		$totalHarga = $_POST['totalHarga'];
		$deskripsi = $_POST['deskripsi'];
		$kotaAwal = $_POST['kotaAwal'];
		$kotaTujuan = $_POST['kotaTujuan'];
		$gambar = $_POST['gambar'];
		$nohp = $_POST['nohp'];
		$namaUser = $_POST['namaUser'];
		$nama = $_SESSION['nama'];
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$fk_idUser = $query_idUser_result[0]['idUser'];


		if ($_POST['jumlahBarang'] != null && $_POST['trip'] != null) {
			$link = '<form action="persetujuanTravellerWanted" method="GET">
				<button  id="persetujuanTraveller" style="color:#f3310a;" class="w3-bar-item w3-display-inline  w3-btn" >Klik di Sini Untuk Persetujuan Penitipan</button>
				<input type="hidden" name="namaBarang" value="' . $namaBarang . '">
				<input type="hidden" name="namaKategori" value="' . $namaKategori . '">
				<input type="hidden" name="hargaDiJual" value="' . $hargaDiJual . '">
				<input type="hidden" name="hargaOngkir" value="' . $hargaOngkir . '">
				<input type="hidden" name="totalHarga" value="' . $totalHarga . '">
				<input type="hidden" name="deskripsi" value="' . $deskripsi . '">
				<input type="hidden" name="kotaAwal" value="' . $kotaAwal . '">
				<input type="hidden" name="kotaTujuan" value="' . $kotaTujuan . '">
				<input type="hidden" name="gambar" value="' . $gambar . '">
				<input type="hidden" name="jumlahBarang" value="' . $_POST['jumlahBarang'] . '">
				<input type="hidden" name="idTrip" value="' . $_POST['trip'] . '">
				<input type="hidden" name="idUser" value="' . $fk_idUser . '">
				</form>';
			$nama = $_POST['namaUser'];
			$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
			$query_idUser_result = $this->db->executeSelectQuery($query_idUser);

			$fk_idUser = $query_idUser_result[0]['idUser'];

			$query_notifikasi = "INSERT INTO Notifikasi VALUES ('$fk_idUser',null,'Verifikasi Penitipan Barang(Wanted Item)', 'Ada traveller yang ingin membelikan barang anda dengan nama $namaBarang $link', 0, '$now')";
			$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi);
		} else {
			$link = '<form action="persetujuanTraveller" method="GET">
					<button  id="persetujuanTraveller" style="color:#f3310a;" class="w3-bar-item w3-display-inline  w3-btn" >Klik di Sini Untuk Persetujuan Penitipan</button>
					<input type="hidden" name="namaBarang" value="' . $namaBarang . '">
					<input type="hidden" name="namaKategori" value="' . $namaKategori . '">
					<input type="hidden" name="hargaDiJual" value="' . $hargaDiJual . '">
					<input type="hidden" name="hargaOngkir" value="' . $hargaOngkir . '">
					<input type="hidden" name="totalHarga" value="' . $totalHarga . '">
					<input type="hidden" name="deskripsi" value="' . $deskripsi . '">
					<input type="hidden" name="kotaAwal" value="' . $kotaAwal . '">
					<input type="hidden" name="kotaTujuan" value="' . $kotaTujuan . '">
					<input type="hidden" name="gambar" value="' . $gambar . '">
					<input type="hidden" name="idUser" value="' . $fk_idUser . '">
					</form>';

			$nama = $_POST['namaUser'];
			$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
			$query_idUser_result = $this->db->executeSelectQuery($query_idUser);

			$fk_idUser = $query_idUser_result[0]['idUser'];

			$query_notifikasi = "INSERT INTO Notifikasi VALUES ('$fk_idUser',null,'Verifikasi Penitipan Barang(Offer Item)', 'Ada customer yang memesan barang anda dengan nama $namaBarang $link', 0, '$now')";
			$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi);
		}
	}

	public function view_persetujuanTravellerOffer()
	{

		$nama = $_SESSION['nama'];
		$title = "titipaja.com - Beli Barang";
		$hargaDiJual = $_GET['hargaDiJual'];
		$hargaOngkir = $_GET['hargaOngkir'];
		$totalHarga = $_GET['totalHarga'];
		$result = $this->getPersetujuanTravellerOffer();
		return view::createView('persetujuanTravellerOffer.php', ["title" => $title, "result" => $result, "nama" => $nama, "hargaDiJual" => $hargaDiJual, "hargaOngkir" => $hargaOngkir, "totalHarga" => $totalHarga]);
	}
	public function view_persetujuanTravellerWanted()
	{

		$nama = $_SESSION['nama'];
		$title = "titipaja.com - Beli Barang";
		$id = $_GET['idTrip'];
		$trip = $this->getTrip($id);
		$hargaDiJual = $_GET['hargaDiJual'];
		$hargaOngkir = $_GET['hargaOngkir'];
		$totalHarga = $_GET['totalHarga'];
		$result = $this->getPersetujuanTravellerWanted();
		return view::createView('persetujuanTravellerWanted.php', ["title" => $title, "result" => $result, "nama" => $nama, "hargaDiJual" => $hargaDiJual, "hargaOngkir" => $hargaOngkir, "totalHarga" => $totalHarga, "trip" => $trip]);
	}

	public function getPersetujuanTravellerOffer()
	{
		$namaBarang = $_GET['namaBarang'];
		$namaKategori = $_GET['namaKategori'];
		$hargaDiJual = $_GET['hargaDiJual'];
		$hargaOngkir = $_GET['hargaOngkir'];
		$totalHarga = $_GET['totalHarga'];
		$deskripsi = $_GET['deskripsi'];
		$kotaAwal = $_GET['kotaAwal'];
		$kotaTujuan = $_GET['kotaTujuan'];
		$gambar = $_GET['gambar'];
		$namaUser = $_GET['idUser'];
		$result = [];
		$result[] = new Offer($namaUser, null, null, null, $kotaAwal, $kotaTujuan, null, null, $namaBarang, null, $deskripsi, $namaKategori, null, $gambar);
		return $result;
	}
	public function getPersetujuanTravellerWanted()
	{
		$namaBarang = $_GET['namaBarang'];
		$namaKategori = $_GET['namaKategori'];
		$hargaDiJual = $_GET['hargaDiJual'];
		$hargaOngkir = $_GET['hargaOngkir'];
		$totalHarga = $_GET['totalHarga'];
		$jumlahBarang = $_GET['jumlahBarang'];
		$deskripsi = $_GET['deskripsi'];
		$gambar = $_GET['gambar'];
		$namaUser = $_GET['idUser'];
		$result = [];
		$result[] = new Wanted($namaUser, null, null, null, $namaBarang, null, $deskripsi, $namaKategori, $gambar, $jumlahBarang);
		return $result;
	}

	public function getTrip($id)
	{
		$query = "SELECT himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,
		himpA.namaKota as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
		FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota where idTrip = '$id' )
		 as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$result[] = new Trip(null, null, $value['idTrip'], $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan']);
		}
		return $result;
	}

	// public function persetujuanPenitipan(){
	// 	// kalau wanted, idCustomer adalah yang memposting gambar wanted, idTraveller adalah yang membelikan barang di luar negeri
	// 	// kalau offer, idCustomer adalah yang memposting gambar offer, idTraveller adalah yang membayar barang offer tersebut
	// 	$timezone = new DateTimeZone('Asia/Jakarta');
	// 	$date = new DateTime();
	// 	$date->setTimeZone($timezone);
	// 	$now = $date->format('Y-m-d H:i:s'); 
	// 	$idCustomer = $_GET['idUser'];
	// 	$query_idUser = "SELECT * FROM `user` WHERE `idUser` LIKE '$idCustomer' ";
	// 	$query_idUser_result = $this->db->executeSelectQuery($query_idUser);    
	// 	$idUser_customer = $query_idUser_result[0]['idUser'];

	// 	$namaBarang = $_GET['namaBarang'];
	// 	$nama = $_SESSION['nama'];
	// 	$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
	// 	$query_idUser_result = $this->db->executeSelectQuery($query_idUser);    
	// 	$idUser_traveller = $query_idUser_result[0]['idUser'];

	// 	$idTrip = $_GET['idTrip'];



	// 	if($_GET['jumlahBarang']!=null){
	// 		$link = '<form action="detailBarangWanted" method="GET">
	// 		<button  id="persetujuanTraveller" style="color:#f3310a;" class="w3-bar-item w3-display-inline  w3-btn" >Klik di Sini Untuk Menuju Market</button>
	// 		<input type="hidden" name="namaBarang" value="'.$namaBarang.'">
	// 		<input type="hidden" name="id" value="'.$idUser_traveller.'">
	// 		</form>';
	// 	}
	// 	else{
	// 		$link = '<form action="detailBarangOffer" method="GET">
	// 		<button  id="persetujuanTraveller" style="color:#f3310a;" class="w3-bar-item w3-display-inline  w3-btn" >Klik di Sini Untuk Menuju Market</button>
	// 		<input type="hidden" name="namaBarang" value="'.$namaBarang.'">
	// 		<input type="hidden" name="id" value="'.$idUser_traveller.'">
	// 		</form>';
	// 	}

	// 	$note = $_GET['note'];  

	// 	if($_GET['verified'] == 'unverified'){		
	// 		$query_notifikasi = "INSERT INTO Notifikasi VALUES ('$idUser_customer',null,'Verifikasi Gagal', '$note $link', 0, '$now')";
	// 		$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi); 
	// 		return false;
	// 	}
	// 	else{  
	// 		$query_notifikasi = "INSERT INTO Notifikasi VALUES ('$idUser_customer',null,'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 0, '$now')";
	// 		$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi); 
	// 		$query_transaksi = "UPDATE transaksi SET idTrip = '$idTrip', idUser2 = '$idCustomer' WHERE idUser1 = '$idUser_traveller' AND namaBarang ='$namaBarang'";
	// 		$query_result2 = $this->db->executeNonSelectQuery($query_transaksi);
	// 		return true;    
	// 	}
	// }

	public function getPembayaranWanted()
	{

		$namaBarang = $_GET['namaBarang'];
		$jumlahBarang = $_GET['jumlahBarang'];
		$totalHarga = $_GET['totalHarga'];
		$kotaAwal = $_GET['kotaAwal'];
		$kotaTujuan = $_GET['kotaTujuan'];
		$waktuAwal = $_GET['waktuAwal'];
		$waktuAkhir = $_GET['waktuAkhir'];
		$deskripsi = $_GET['deskripsi'];
		$tipTraveller = $_GET['hargaOngkir'];
		$hargaBarang = $_GET['hargaBarang'];
		$gambar = $_GET['gambar'];
		$fee = ($totalHarga - ($totalHarga * (4 / 100))) + $tipTraveller;
		$kodeUnik = rand(100, 999);
		$result = [];
		$result[] = new Pembayaran($kotaAwal, $kotaTujuan, $waktuAwal, $waktuAkhir, $namaBarang, $deskripsi, $hargaBarang, $tipTraveller, $fee, $kodeUnik, $totalHarga, $gambar);
		return $result;
	}

	public function getPembayaranOffer()
	{
		$namaBarang = $_POST['namaBarang'];
		$totalHarga = $_POST['totalHarga'];
		$kotaAwal = $_POST['kotaAwal'];
		$kotaTujuan = $_POST['kotaTujuan'];
		$waktuAwal = $_POST['waktuAwal'];
		$waktuAkhir = $_POST['waktuAkhir'];
		$deskripsi = $_POST['deskripsi'];
		$tipTraveller = $_POST['hargaOngkir'];
		$hargaBarang = $_POST['hargaBarang'];
		$gambar = $_POST['gambar'];
		$fee = ($hargaBarang * (4 / 100));
		$kodeUnik = rand(100, 999);
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');
		$idCustomer = $_POST['idUser'];
		$query_idUser = "SELECT * FROM `user` WHERE `idUser` LIKE '$idCustomer' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser_customer = $query_idUser_result[0]['idUser'];

		$namaBarang = $_POST['namaBarang'];
		$nama = $_SESSION['nama'];
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser_traveller = $query_idUser_result[0]['idUser'];

		$nama = $_SESSION['nama'];
		if ($_POST['verified'] == 'verified') {
			$link = '<form action="pembayaranOffer" method="GET">
					<button  id="pembayaranOffer" style="color:#f3310a;" class="w3-bar-item w3-display-inline  w3-btn" >Klik di Sini Untuk Pembayaran</button>
					<input type="hidden" name="namaBarang" value="' . $namaBarang . '">
					<input type="hidden" name="totalHarga" value="' . $totalHarga . '">
					<input type="hidden" name="hargaBarang" value="' . $hargaBarang . '">
					<input type="hidden" name="kotaAwal" value="' . $kotaAwal . '">
					<input type="hidden" name="kotaTujuan" value="' . $kotaTujuan . '">
					<input type="hidden" name="waktuAwal" value="' . $waktuAwal . '">
					<input type="hidden" name="waktuAkhir" value="' . $waktuAkhir . '">
					<input type="hidden" name="deskripsi" value="' . $deskripsi . '">
					<input type="hidden" name="tipTraveller" value="' . $tipTraveller . '">
					<input type="hidden" name="gambar" value="' . $gambar . '">
					<input type="hidden" name="fee" value="' . $fee . '">
					<input type="hidden" name="kodeUnik" value="' . $kodeUnik . '">
					</form>';
			$query_notifikasi = "INSERT INTO Notifikasi VALUES ('$idUser_customer',null,'Verifikasi Penitipan Barang Berhasil', 'Permintaan anda berhasil diterima $namaBarang $link', 0, '$now')";
			$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi);
			$query_transaksi = "UPDATE transaksi SET  idUser2 = '$idUser_customer', statusBarang = 'onPayment', jumlahBarang = '1', hargaBarang = '$hargaBarang', hargaOngkir = '$tipTraveller', hargaJasa = '$fee' WHERE idUser1 = '$idUser_traveller' AND namaBarang ='$namaBarang'";
			$query_result2 = $this->db->executeNonSelectQuery($query_transaksi);
		}
	}

	public function getPembayaranOfferDua()
	{
		$namaBarang = $_GET['namaBarang'];
		$totalHarga = $_GET['totalHarga'];
		$kotaAwal = $_GET['kotaAwal'];
		$kotaTujuan = $_GET['kotaTujuan'];
		$waktuAwal = $_GET['waktuAwal'];
		$waktuAkhir = $_GET['waktuAkhir'];
		$deskripsi = $_GET['deskripsi'];
		$tipTraveller = $_GET['tipTraveller'];
		$hargaBarang = $_GET['hargaBarang'];
		$gambar = $_GET['gambar'];
		$fee = $_GET['fee'];
		$kodeUnik = $_GET['kodeUnik'];
		$result = [];
		$result[] = new Pembayaran($kotaAwal, $kotaTujuan, $waktuAwal, $waktuAkhir, $namaBarang, $deskripsi, $hargaBarang, $tipTraveller, $fee, $kodeUnik, $totalHarga, $gambar);
		return $result;
	}

	public function insertPembayaranKeAdmin()
	{
		$buktiPembayaran = $_FILES['buktiPembayaran']['name'];
		$namaBarang = $_POST['namaBarang'];
		$nama = $_SESSION['nama'];
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];
		$namaBank = $_POST['namaBank'];

		$query_namaBank = "SELECT * FROM `bank` WHERE `namaBank` LIKE '$namaBank' ";
		$query_namaBank_result = $this->db->executeSelectQuery($query_namaBank);
		$idBank = $query_namaBank_result[0]['idBank'];

		$oldname = $_FILES['buktiPembayaran']['tmp_name'];
		$newname = dirname(__DIR__) . "\\view\image\pembayaran\\" . $buktiPembayaran;
		move_uploaded_file($oldname, $newname);

		$query = "UPDATE transaksi SET buktiPembayaran ='$buktiPembayaran', statusBarang = 'onPaymentProgress', statusPembayaran = 'pending', idBankPembayaran = '$idBank' WHERE idUser2 = '$idUser' AND namaBarang = '$namaBarang' ";
		$query_result = $this->db->executeNonSelectQuery($query);
	}

	// public function getTracking(){
	// 	$nama = $_SESSION['nama'];
	// 	$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' ";
	// 	$query_idUser_result = $this->db->executeSelectQuery($query_idUser);    
	// 	$idUser = $query_idUser_result[0]['idUser'];
	// 	$query = "SELECT"
	// }

}
