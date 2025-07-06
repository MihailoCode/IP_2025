<?php 
		session_start();
		require_once 'Klijent.php';
		
		$ulogovan = $_SESSION['ulogovan'];
		$klijent = unserialize($_SESSION['klijent']);
		
		$ulogovanRequest = isset($_GET['user'])?$_GET['user']:"";
		if(isset($ulogovan)){
	?>
<!DOCTYPE html>
<html>
<head>	
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<h1>SESIJA : Ulogovan je <?php echo $ulogovan;?></h1>
	
	<h1>SESIJA KLASA : Ulogovan je <?php  echo $klijent->user ;?></h1>
	
	<h1>REQUEST : Ulogovan je <?php $ulogovanRequest;?></h1>
	<br> 
	<a href="prikazDalje.php">IDEMO DALJE</a>
	<br>
	<a href="LogIn.php">LOGOUT</a>
	<br>
</body>
</html>
<?php 
	}else 
		header("Location:index.php");
?>
