<?php
require_once 'db.php';

class DAO {
	private $db;

	private $INSERTOSOBA = "INSERT INTO osobe (ime, prezime, godiste) VALUES (?, ?, ?)";
	private $DELETEOSOBA = "DELETE  FROM osobe WHERE id = ?";
	private $SELECTBYID = "SELECT * FROM osobe WHERE id = ?";	
	
	private $UPDATEBYID = "UPDATE `osobe` SET `ime`=?, `prezime`=?, `godiste`=? WHERE id = ?";
	private $SELECTOSOBE = "SELECT * from osobe";
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function insert($osoba)
	{
		$statement = $this->db->prepare($this->INSERTOSOBA);
		$statement->bindValue(1, $osoba->ime);
		$statement->bindValue(2, $osoba->prezime);
		$statement->bindValue(3, $osoba->godiste);
		
		$statement->execute();
	}

	public function deleteById($idosoba)
	{
		$statement = $this->db->prepare($this->DELETEOSOBA);
		$statement->bindValue(1, $idosoba);
		
		$statement->execute();
	}

	public function getById($idosoba)
	{
		$statement = $this->db->prepare($this->SELECTBYID);
		$statement->bindValue(1, $idosoba);
		
		$statement->execute();
		
		$result = $statement->fetch(PDO::FETCH_OBJ);
		return $result;
	}
	
	public function editById($osoba)
	{
		$statement = $this->db->prepare($this->UPDATEBYID);
		$statement->bindValue(1, $osoba->ime);
		$statement->bindValue(2, $osoba->prezime);
		$statement->bindValue(3, $osoba->godiste);
		$statement->bindValue(4, $osoba->id);
		
		$statement->execute();
	}
	
	public function selectOsobe()
	{
		$statement = $this->db->prepare($this->SELECTOSOBE);
		
		$statement->execute();
		
		$result = $statement->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}
	
}
?>
