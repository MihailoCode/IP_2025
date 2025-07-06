<?php
require_once '../config/db.php';

class DAOProizvodjaci {
	private $db;

	
	private $INSERTPROIZVODJACI = "INSERT INTO proizvodjaci (zemlja_porekla) VALUES (?)";
	
	private $GETALLPROIZVODJACI = "SELECT * FROM proizvodjaci ORDER BY id ASC";
	private $GETPROIZVODJACBYID = "SELECT * FROM proizvodjaci WHERE id = ?";
	private $DELETEPROIZVODJACBYID = "DELETE FROM proizvodjaci WHERE id = ?";
	private $UPDATEPROIZVODJACI = "UPDATE proizvodjaci SET zemlja_porekla = ? WHERE id=?";
	public function __construct()
	{
		$this->db = DB::createInstance();
	}
	
	
	public function getAllProizvodjaci()
	{
	    
	    $statement = $this->db->prepare($this->GETALLPROIZVODJACI);
	    
	    $statement->execute();
	    
	    $result = $statement->fetchAll();
	    return $result;
	}
	
	public function getProizvodjacByID($id)
	{
	    
	    $statement = $this->db->prepare($this->GETPROIZVODJACBYID);
	    $statement->bindValue(1, $id);
	    $statement->execute();
	    
	    $result = $statement->fetch();
	    return $result;
	}
	
	public function deleteProizvodjacByID($id)
	{
	    
	    $statement = $this->db->prepare($this->DELETEPROIZVODJACBYID);
	    $statement->bindValue(1, $id);
	    $statement->execute();
	    
	    return $statement->rowCount();
	   
	}

	public function updateProizvodjaci($zemlja_porekla, $id)
	{
		
		$statement = $this->db->prepare($this->UPDATEPROIZVODJACI);
		$statement->bindValue(1, $zemlja_porekla);
		$statement->bindValue(2, $id);
		
		if ($statement->execute()) {
		    return true;
		} else {
		    return false;
		}
		
	}

	public function insertProizvodjaci($zemlja_porekla)
	{
		
	    $statement = $this->db->prepare($this->INSERTPROIZVODJACI);
		$statement->bindValue(1, $zemlja_porekla);
		
		if ($statement->execute()) {
		    return true;
		} else {
		    return false;
		}
	}

	
}
?>
