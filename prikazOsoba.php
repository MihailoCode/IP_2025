<?php 

	$osobe = isset($osobe)? $osobe : NULL;
	
	if($osobe != NULL){
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
	<br>
	<table border="1px" width="80%">
		<tr>
			<th>ID</th>
			<th>IME</th>
			<th>PREZIME</th>
			<th>GODISTE</th>
			<th>IZBRISI</th>
			<th>IZMENI</th>
		</tr>
		<?php foreach ($osobe as $o) {?>
		<tr>
			<td><?= $o->id?></td>
			<td><?= $o->ime?></td>
			<td><?= $o->prezime?></td>
			<td><?= $o->godiste?></td>
			<td><a href="controllerOsobe.php?action=Izbrisi&id=<?= $o->id?>">IZBRISI</a></td>
			<td><a href="controllerOsobe.php?action=Izmeni&id=<?= $o->id?>">IZMENI</a></td>
		</tr>
		<?php }?>
	</table>
<footer><?php include './templates/footer.php';?></footer>
</body>
</html>
<?php 
	} else {
		header("Location: index.php");
	}
?>