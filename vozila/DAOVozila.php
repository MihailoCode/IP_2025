<?php
require_once '../config/db.php';

class DAOVozila {
	private $db;
	
	private $INSERTVOZILA = "INSERT INTO vozila (marka, cena, godiste, id_proizvodjaca) VALUES (?, ?, ?, ?)";
	private $GETALLVOZILABYPROIZVODJAC = "SELECT vozila.*, proizvodjaci.zemlja_porekla FROM vozila JOIN proizvodjaci ON vozila.id_proizvodjaca = proizvodjaci.id WHERE proizvodjaci.id = ?";
	private $GETALLVOZILA = "SELECT vozila.*, proizvodjaci.zemlja_porekla FROM vozila JOIN proizvodjaci ON vozila.id_proizvodjaca = proizvodjaci.id ORDER BY id ASC";
	private $GETALLVOZILABYPROIZVODJACZP = "SELECT vozila.*, proizvodjaci.zemlja_porekla FROM vozila JOIN proizvodjaci ON vozila.id_proizvodjaca = proizvodjaci.id WHERE proizvodjaci.zemlja_porekla = ?";
	
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}
	
	public function getAllVozila()
	{
	    
	    $statement = $this->db->prepare($this->GETALLVOZILA);
	    
	    $statement->execute();
	    
	    $result = $statement->fetchAll();
	    return $result;
	}
	
	public function getAllVozilaByProizvodjac($id) {
	    $statement = $this->db->prepare($this->GETALLVOZILABYPROIZVODJAC);
	    $statement->bindValue(1, $id);
	    
	    $statement->execute();
	    
	    $result = $statement->fetchAll();
	    return $result;
	}
	
	public function getAllVozilaByProizvodjacZP($zemlja_porekla) {
	    $statement = $this->db->prepare($this->GETALLVOZILABYPROIZVODJACZP);
	    $statement->bindValue(1, $zemlja_porekla);
	    
	    $statement->execute();
	    
	    $result = $statement->fetchAll();
	    return $result;
	}
	
	public function insertVozila($marka, $cena, $godiste, $id_proizvodjaca)
	{
	    
	    $statement = $this->db->prepare($this->INSERTVOZILA);
	    $statement->bindValue(1, $marka);
	    $statement->bindValue(2, $cena);
	    $statement->bindValue(3, $godiste);
	    $statement->bindValue(4, $id_proizvodjaca);
	    
	    $statement->execute();
	}
}
?>
