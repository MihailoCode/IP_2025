<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<table>
<tr>
<th>ID</th>
<th>Zemlja porekla</th>

<?php foreach ($proizvodjaci as $proizvodjac) {?>
</tr>
<tr>
<td><?php echo $proizvodjac['id']?></td>
<td><?php echo $proizvodjac['zemlja_porekla']?></td>

</tr>
<?php }?>
</table>
<br><br>
<a href="../vozila/?action=insertnew">Unesi novo vozilo</a><br><br>
<a href="../vozila/">Prikazi sva vozila</a>

</body>
</html>