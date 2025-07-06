<?php
  require_once 'Osoba.php';
  //require_once 'Baza.php'; 
  require_once 'DAO.php';
   
$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija
//echo $action;

if ($_SERVER['REQUEST_METHOD']=="POST"){
    //akcije za unos i izmenu
    if ($action == 'Unesi') {
    	//echo $action;
       	$ime = isset($_POST["ime"])? $_POST["ime"] : "";
    	$prezime = isset($_POST["prezime"])? $_POST["prezime"] : "";
    	$godiste = isset($_POST["godiste"])? $_POST["godiste"] : "";
    	// validacija
    	$osoba = new Osoba(0, $ime, $prezime, $godiste);
    	
    	//insert($osoba);
    	//$osobe = $_SESSION['osobe'];
    	
    	$dao = new DAO();
    	$dao->insert($osoba);
    	$osobe = $dao->selectOsobe();
    	
    	include 'prikazOsoba.php';
    	
    } elseif ($action == 'Izmeni') {
        $ime = isset($_POST["ime"])? $_POST["ime"] : "";
    	$prezime = isset($_POST["prezime"])? $_POST["prezime"] : "";
    	$godiste = isset($_POST["godiste"])? $_POST["godiste"] : "";
    	$id = isset($_POST["id"])? $_POST["id"] : "";
    	// validacija
    	$osoba = new Osoba($id, $ime, $prezime, $godiste);
    	//editById($osoba);
    	//$osobe = $_SESSION['osobe'];
    	$dao = new DAO();
    	$dao->editById($osoba);
    	$osobe = $dao->selectOsobe();
    	include 'prikazOsoba.php';
    } 
    
} elseif ($_SERVER['REQUEST_METHOD']=="GET"){
    //akcije za prikaz i brisanje
    if ($action == 'all') {
        //$osobe = $_SESSION['osobe'];
        $dao = new DAO();
    	$osobe = $dao->selectOsobe();
    	//var_dump($osobe);
        include 'prikazOsoba.php';
    } elseif ($action == 'Izbrisi'){
    	$id = isset($_GET["id"])? $_GET["id"] : "";
    	// provera id dal postoji, ako ne postoji redirekcija negde.. npr index.php
        //deleteById($id);
        //$osobe = $_SESSION['osobe'];
        $dao = new DAO();
    	$dao->deleteById($id);
    	$osobe = $dao->selectOsobe();
        include 'prikazOsoba.php';
    }elseif ($action == 'Izmeni'){
        $id = isset($_GET["id"])? $_GET["id"] : "";
        // provera id dal postoji, ako ne postoji redirekcija negde.. npr index.php
        //$osoba = getById($id);
        //var_dump($osoba);
        $dao = new DAO();
    	$osoba = $dao->getById($id);
        include 'editOsoba.php';
    }
    
} else {
    //...
    header("Location: index.php"); //opciono
    die();
}

//funkcija za preradu unetih podataka

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
/*
function deleteById($id){
	//var_dump($_SESSION['osobe']);
	if(count($_SESSION['osobe'])>0)
	for ($i = 0; $i < count($_SESSION['osobe']); $i++) {
		if($_SESSION['osobe'][$i]->id == $id){
			unset($_SESSION['osobe'][$i]);
			$_SESSION['osobe'] = array_values($_SESSION['osobe']);// preslaganje kljuceva niza, od 0
			break;
		}
	}
}
function insert($osoba){
	$_SESSION['osobe'][] = $osoba;
}
function getById($id){
	// naci u nizu
	if(count($_SESSION['osobe'])>0)
	for ($i = 0; $i < count($_SESSION['osobe']); $i++) {
		if($_SESSION['osobe'][$i]->id == $id){
			return $_SESSION['osobe'][$i];
		}
	}
	return NULL;
}
function editById($osoba) {
	// zameni staru sa novom
	if(count($_SESSION['osobe'])>0)
	for ($i = 0; $i < count($_SESSION['osobe']); $i++) {
		if($_SESSION['osobe'][$i]->id == $osoba->id){
			$_SESSION['osobe'][$i] = $osoba;
			break;
		}
	}
}
*/
?>