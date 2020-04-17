<?php

class User{
    protected $IDuser;
	protected $username;
	protected $password;

	public function __construct($IDuser,$username,$password){
		$this->IDuser$IDuser = $IDuser;
		$this->username = $username;
		$this->password = $password;
	}

	public function getIDUser(){
		return $this->IDuser$IDuser;
	}

	public function getUsername(){
		return $this->username;
	}

	public function getPassword(){
		return $this->password;
	}

}
?>