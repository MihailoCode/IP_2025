<html>

<head>
    <title>Naslov teksta</title>
</head>

<body>

<?php

echo "Zdravo svete!<br>";
$a=5;
$b=10;
echo $a+$b;
$a="<br>ovo je tekst ";
$b="i ovo je neki tekst";
echo $a.$b." ovo je tekst<br>";

$x=12.2345;

function Test()
{
    global $x;
    static $n=0;
    
    $n=$n+1;
    echo "Promenjiva x unutar fje je $n<br>";
}

echo "Promenjiva x van fje je $x<br>";
Test();
Test();
Test();
Test();
var_dump($x);
$niz=array("mika","pera","zika",123,64.45235);
var_dump($niz);
define("NASLOV","Dobrodošli!");
$NASLOV=123;
echo $NASLOV." ".NASLOV;

foreach($niz as $i)
{
    echo "<br>".$i."<br>";
}


?>

</body>

</html>