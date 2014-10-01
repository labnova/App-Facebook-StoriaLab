<?php

//require_once("config.php");

class MySQLIDatabase {

	private $connection;

	public function open_connection() {
		$this->connection= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

		if(!$this->connection) {
			die("la connessione al database è fallita: " .mysqli_error($this->connection));
		}

	}

	public function close_connection() {
		if(isset($this->connection)) {
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}

	public function query($sql) {
		$result= mysqli_query($this->connection, $sql);
		$this->confirm_query($result);
		return $result;


	}

	

	public function fetch_array($result_set) {
		return mysqli_fetch_array($result_set);
	}

	public function fetch_assoc($result_set) {
		return mysqli_fetch_assoc($result_set);
	}

	


	public function num_rows($result_set) {
		return mysqli_num_rows($result_set);
	}

	public function insert_id() {
		//prende l'ultimo id inserito
		return mysqli_insert_id($this->connection); 
	}

	public function affected_rows() {
		return mysqli_affected_rows($this->connection);
	}


public function confirm_query($result) { 
		
		if(!$result) {
			die("la query al database non funziona: " .mysqli_error($this->connection));
		}

	}



}

$database= new MySQLIDatabase();
$database->open_connection();



?>