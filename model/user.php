<?php

class User{
    protected $IDuser;
	protected $username;
	protected $password;
	protected $alamat;
	protected $noHp; 
	protected $email;
	protected $swafoto;

	public function __construct($IDuser,$username,$password, $alamat, $noHp, $email, $swafoto){
		$this->$IDuser = $IDuser;
		$this->username = $username;
		$this->password = $password;
		$this->alamat = $alamat;
		$this->noHp = $noHp;
		$this->email = $email;  
		$this->swafoto = $swafoto;   
	}

	public function getIDUser(){
		return $this->IDuser;
	}

	public function getUsername(){
		return $this->username;
	}

	public function getPassword(){
		return $this->password;
	}

}
?>