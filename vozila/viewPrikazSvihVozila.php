<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<form action="../vozila/" method="get">
    <select name="id">
    				<?php foreach ($proizvodjaci as $proizvodjac) {?>
    				<option value="<?php echo $proizvodjac['id']; ?>"><?php echo $proizvodjac['zemlja_porekla']; ?></option>
    					<?php }?>
    </select>
    <input type="submit" name="action" value="Sortiraj">
</form>
<a href="../vozila/">Osvezi</a>
<br><br>
<table>
<tr>
<th>ID</th>
<th>Marka</th>
<th>Cena</th>
<th>Godiste</th>
<th>ID proizvodjaca</th>
<th>Zemlja porekla</th>
<?php foreach ($vozila as $vozilo) {?>
</tr>
<tr>
<td><?php echo $vozilo['id']?></td>
<td><?php echo $vozilo['marka']?></td>
<td><?php echo $vozilo['cena']?></td>
<td><?php echo $vozilo['godiste']?></td>
<td><?php echo $vozilo['id_proizvodjaca']?></td>
<td><?php echo $vozilo['zemlja_porekla']?></td>
</tr>
<?php }?>
</table>
<br><br>
<a href="../vozila/?action=insertnew">Unesi novo vozilo</a><br><br>
<a href="../proizvodjaci/?action=all">Prikazi sve proizvodjace</a>

</body>
</html>