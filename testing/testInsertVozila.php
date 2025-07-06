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
    echo $dao->insertVozila("BMW", 500000.00, 2018, 1);
?>
</body>
</html>