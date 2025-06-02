<html>

<head>
    <title>Naslov teksta</title>
</head>

<body>

<?php

$a=5;
$b=10;
echo "Ja pisem $a";
$a="tekst";
?>

<br>
<h1>ovo je naslov</h1>
<p>ovo je paragraf</p>

<?php
$x=5;

function Test()
{
    static $h=0;
    $h=$h+1;
    echo "<br>prom h unutar fje Test je ".$h;
}

Test();
Test();
Test();
Test();
echo "<br>promenjiva x van fje Test je $x";

$p="fasd";
echo "<br>";
var_dump($p);

class Car
{
	function Car()
	{
		$this->model="";
	}
}
$auto=new Car(); //kreiranje objekta
$auto->model="Volvo";
var_dump($auto);
//echo $auto->model;
$ucenici=array("Milan","Marko","Jovan","Ivana",12,45.45);
var_dump($ucenici);

?>

</body>

</html>