<?php 
require '../DAO/DAOProizvodjaci.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<?php 
    $dao = new DAOProizvodjaci();
    $proizvodjaci = $dao->getAllProizvodjaci();
    foreach ($proizvodjaci as $proizvodjac)
        echo $proizvodjac['id']." ".$proizvodjac['zemlja_porekla']."<br>";
?>
</body>
</html>