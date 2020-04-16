<?php

class Book{
	public $id;
	public $name;
	public $author;
	public $status;
	public $return_date;

	public function __construct($id,$name,$author,$status,$return_date){
		$this->id = $id;
		$this->name = $name;
		$this->author = $author;
		$this->status = $status;
		$this->return_date = $return_date;
	}
}


?>