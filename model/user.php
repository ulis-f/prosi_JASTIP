<?php

class User{
    public $IDuser;
	public $username;
	public $password;
	public $alamat;
	public $noHp; 
	public $email;
	public $swafoto;
	public $gambarktp;
	public $namabank;
	public $norek;
	public $noktp;
	public $gambarProfile;


	public function __construct($IDuser,$username,$password, $alamat, $noHp, $email, $swafoto, $gambarktp, $namabank, $norek, $noktp,$gambarProfile){
		$this->IDuser = $IDuser;
		$this->username = $username;
		$this->password = $password;
		$this->alamat = $alamat;
		$this->noHp = $noHp;
		$this->email = $email;  
		$this->swafoto = $swafoto;   
		$this->gambarktp = $gambarktp; 
		$this->namabank = $namabank;
		$this->norek = $norek;
		$this->noktp = $noktp;  
		$this->gambarProfile = $gambarProfile;
	}


}
?>