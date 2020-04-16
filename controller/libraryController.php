<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/book.php";

class LibraryController{
	protected $db;

	public function __construct(){
		$this->db = new MySQLDB("localhost","root","","library");
	}

	public function view_index(){
		$title = "Index";
		$result = $this->getAllBook();
		return View::createView('index.php',[
			"title" => $title,
			"result"=> $result
		]);
	}

	public function view_add(){
		$title = "Add";
		return View::createView('add.php',[
			"title" => $title
		]);
	}

	public function view_rent(){
		$id = $_GET['id'];
		$book = $this->getBookById($id);
		$title = "Rent";
		return View::createView('rent.php',[
			"title" => $title,
			"book"=> $book
		]);
	}

	public function getAllBook(){
		//cara 1
		$query = "SELECT * FROM book";
		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
			$ret = null;
			if (!$value["status"]) {
				//get date
				$query2 = "SELECT * FROM rent 
					WHERE book_id=".$value["book_id"]." 
					ORDER BY rent_datetime DESC 
					LIMIT 1";
				$query_result2 = $this->db->executeSelectQuery($query2);
				$date = new DateTime($query_result2[0]['rent_datetime']);
				$date->modify('+'.$query_result2[0]['duration'].' day');
				$ret = $date->format('d-m-Y');
			}
			$result[] = new Book($value['book_id'], $value['name'], $value['author'],$value["status"],$ret);
		}
		//cara 2
		// $query = "SELECT book.book_id,book.name,book.author,book.status,rent.rent_datetime,rent.duration 
		// 	FROM book 
		// 	LEFT JOIN (
		// 		SELECT rent.book_id, rent.rent_datetime,rent.duration
		// 		FROM rent 
		// 		INNER JOIN 
		// 			(SELECT book_id,MAX(rent_datetime) date 
		// 			FROM rent GROUP BY book_id) sub 
		// 		ON rent.book_id = sub.book_id 
		// 		WHERE rent.rent_datetime = sub.date
		// 	) rent
		// 	ON book.book_id = rent.book_id";

		// $query_result = $this->db->executeSelectQuery($query);
		// $result = [];
		// foreach ($query_result as $key => $value) {
		// 	$ret = null;
		// 	if (!$value["status"]) {
		// 		$date = new DateTime($value['rent_datetime']);
		// 		$date->modify('+'.$value['duration'].' day');
		// 		$ret = $date->format('d-m-Y');
		// 	}
		// 	$result[] = new Book($value['book_id'], $value['name'], $value['author'],$value["status"],$ret);
		// }
		return $result;
	}

	public function getBookById($id){
		$query = "SELECT * from book WHERE book_id=".$id;

		$query_result = $this->db->executeSelectQuery($query);
		foreach ($query_result as $key => $value) {
			return new Book($value['book_id'], $value['name'], $value['author'],"",null);
		}
		return null;
	}

	public function addBook(){ //seharusnya ada validasi isset dan escape string
		$name = $_POST['name'];
		$author = $_POST['author'];

		$query = "INSERT INTO book(name, author, status) VALUES (".$name.",".$author.",1)";
		$query_result = $this->db->executeNonSelectQuery($query);
	}

	public function rentBook(){ //seharusnya ada validasi isset dan escape string
		$id = $_POST['id'];
		$duration = $_POST['duration'];
		$today = new DateTime();

		$query = "INSERT INTO rent(book_id, rent_datetime, duration) VALUES (".$id.",'".$today->format("Y-m-d H:i:s")."',".$duration.")";
		$query_result = $this->db->executeNonSelectQuery($query);

		$query = "UPDATE book SET status=0 WHERE book_id=".$id;
		$query_result = $this->db->executeNonSelectQuery($query);

	}

	public function returnBook(){ //seharusnya ada validasi isset dan escape string
		$id = $_POST['book_id'];

		$query2 = "SELECT id FROM rent 
					WHERE book_id=".$id." 
					ORDER BY rent_datetime DESC 
					LIMIT 1";
		$query_result2 = $this->db->executeSelectQuery($query2);
		$today = new DateTime();

		$query = "UPDATE rent SET return_datetime='".$today->format("Y-m-d H:i:s")."' 
		WHERE id=".$query_result2[0]["id"];
		// var_dump($query);
		$query_result = $this->db->executeNonSelectQuery($query);

		$query = "UPDATE book SET status=1 WHERE book_id=".$id;
		$query_result = $this->db->executeNonSelectQuery($query);
	}

	public function deleteBook(){ //seharusnya ada validasi isset dan escape string
		$id = $_POST['book_id'];
		$query = "DELETE FROM rent WHERE book_id=".$id;
		$query_result = $this->db->executeNonSelectQuery($query);

		$query = "DELETE FROM book WHERE book_id=".$id;
		$query_result = $this->db->executeNonSelectQuery($query);
	}
}


?>