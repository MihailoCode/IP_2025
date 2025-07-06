<?php 
	$osoba = isset($osoba)? $osoba : NULL;
	if($osoba != NULL){
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>CRUD</title>
</head>
<body>
<header><?php include './templates/header.php';?></header>
<nav><?php include './templates/nav.php';?></nav>
	<form action="controllerOsobe.php" method="post">
		Ime: <br>
		<input type="text" name="ime" value="<?= $osoba->ime?>"><br>
		Prezime: <br>
		<input type="text" name="prezime" value="<?= $osoba->prezime?>"><br>
		Godiste: <br>
		<input type="text" name="godiste" value="<?= $osoba->godiste?>"><br>
		<input type="hidden" name="id" value="<?= $osoba->id?>">
		<input type="submit" name="action" value="Izmeni">
	</form>
<footer><?php include './templates/footer.php';?></footer>
</body>
</html>
<?php } else header("Location: index.php");?>