<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<?php 
	session_start();
	require_once 'Klijent.php';
		
	$ulogovan = isset($_SESSION['ulogovan'])?$_SESSION['ulogovan']:"";
	$klijent = isset($_SESSION['klijent'])? unserialize($_SESSION['klijent']):null;
		
	$ulogovanRequest = isset($_GET['user'])?$_GET['user']:"";
	?>
	
	<h1>SESIJA : Ulogovan je <?php  echo $ulogovan ;?></h1>
	
	<h1>SESIJA KLASA: Ulogovan je <?php if(isset($klijent))echo $klijent->user ;?>
	</h1>
	
	<h1>REQUEST : Ulogovan je <?php $ulogovanRequest;?></h1>
	
	<br> 
	<a href="prikaz.php">NAZAD</a>
	<br>
	<a href="LogIn.php">LOGOUT</a>
	<br>
</body>
</html>
