<?php


class Sql extends PDO {

	private $conn;


	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "root");
	}


	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) {
			
			//$statment->bindParam($statment, $key, $value);
			$this->setParam($statement, $key, $value);
		}

	}


	private function setParam($statement, $key, $value){

		$statement->bindParam($key, $value);
	}


	public function query($rawquery, $params = array()){

		$stmt = $this->conn->prepare($rawquery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;
	}


	public function select($rawquery, $params = array()){

		$stmt = $this->query($rawquery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}




}




?>
