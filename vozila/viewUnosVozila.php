<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<form action="" method="post">
    Marka: <input type="text" name="marka" placeholder="marka"><br><br>
    Cena: <input type="text" name="cena" placeholder="cena"><br><br>
    Godiste: <input type="number" name="godiste" placeholder="godiste"><br><br>
    Zemlja porekla: <select name="id_proizvodjaca">
    				<?php foreach ($proizvodjaci as $proizvodjac) {?>
    				<option value="<?php echo $proizvodjac['id']; ?>"><?php echo $proizvodjac['zemlja_porekla']; ?></option>
    					<?php }?>
    </select><br><br>
    <input type="submit" name="action" value="Unesi">
</form>
<br><br>
<a href="../vozila/">Prikazi sva vozila</a><br><br>
<a href="../proizvodjaci/?action=all">Prikazi sve proizvodjace</a>
</body>
</html>