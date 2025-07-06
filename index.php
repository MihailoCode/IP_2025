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
		<input type="text" name="ime"><br>
		Prezime: <br>
		<input type="text" name="prezime"><br>
		Godiste: <br>
		<input type="text" name="godiste"><br>
		<input type="submit" name="action" value="Unesi">
	</form>
<footer><?php include './templates/footer.php';?></footer>
</body>
</html>