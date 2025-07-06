<?php
	session_start();
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require_once 'Klijent.php';

	$user = isset($_POST['user'])?$_POST['user']:"";
	$pass = isset($_POST['pass'])?$_POST['pass']:"";
	
	if(!empty($user) && !empty($pass)){	
		
		$_SESSION['ulogovan'] = $user;
		
		$klijent = new Klijent($user, $pass);
		$_SESSION['klijent'] = serialize($klijent);
		
		header("Location:prikaz.php");
		
	}else{
		$msg= "Morate popuniti sva polja";
		include 'index.php';
	}
}else if ($_SERVER["REQUEST_METHOD"] == "GET") {
	session_destroy();
	$msg= "Morate se ulogovati";
	include 'index.php';
} 
?>
