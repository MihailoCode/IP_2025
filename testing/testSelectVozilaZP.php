<?php 
require '../DAO/DAOVozila.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<?php 
    $dao = new DAOVozila();
    //$vozila = $dao->getAllVozilaByProizvodjac(1);
    $vozila = $dao->getAllVozila();
    //var_dump($vozila);
    foreach ($vozila as $vozilo)
        echo $vozilo['id']." ".$vozilo['marka']." ".$vozilo['cena']." ".$vozilo['godiste']." ".$vozilo['id_proizvodjaca']." ".$vozilo['zemlja_porekla']."<br>";
?>
</body>
</html>