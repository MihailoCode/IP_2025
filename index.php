<?php

$a=-5;

$niz=["jabuka","kruska","sljiva","kajsija","dunja"];
$niz[7]="malina";

$osobe=[

    ["ime"=>"Marko","prezime"=>"Markovic","godiste"=>"2000","ocene"=>array(6,7,8,9)],
    ["ime"=>"Stefan","prezime"=>"Markovic","godiste"=>"2002","ocene"=>array(6,7,8,9)],
    ["ime"=>"Marko","prezime"=>"Markovic","godiste"=>"2005","ocene"=>array(6,8,8,8)],
    ["ime"=>"Jelena","prezime"=>"Markovic","godiste"=>"2001","ocene"=>array(6,7,10,10)],
    ["ime"=>"Marko","prezime"=>"Mirkovic","godiste"=>"2003","ocene"=>array(6,9,9,8)],
    ["ime"=>"Marko","prezime"=>"Markovic","godiste"=>"2000","ocene"=>array(6,7,8,9)],
    ["ime"=>"Stefan","prezime"=>"Markovic","godiste"=>"2002","ocene"=>array(6,7,8,9)],
    ["ime"=>"Marko","prezime"=>"Markovic","godiste"=>"2005","ocene"=>array(6,8,8,8)],
    ["ime"=>"Jelena","prezime"=>"Markovic","godiste"=>"2001","ocene"=>array(6,7,10,10)],
    ["ime"=>"Marko","prezime"=>"Mirkovic","godiste"=>"2003","ocene"=>array(6,9,9,8)],
    ["ime"=>"Marko","prezime"=>"Markovic","godiste"=>"2000","ocene"=>array(6,7,8,9)],
    ["ime"=>"Stefan","prezime"=>"Markovic","godiste"=>"2002","ocene"=>array(6,7,8,9)],
    ["ime"=>"Marko","prezime"=>"Markovic","godiste"=>"2005","ocene"=>array(6,8,8,8)],
    ["ime"=>"Jelena","prezime"=>"Markovic","godiste"=>"2001","ocene"=>array(6,7,10,10)],
    ["ime"=>"Marko","prezime"=>"Mirkovic","godiste"=>"2003","ocene"=>array(6,9,9,8)],
    ["ime"=>"Marko","prezime"=>"Markovic","godiste"=>"2000","ocene"=>array(6,7,8,9)],
    ["ime"=>"Stefan","prezime"=>"Markovic","godiste"=>"2002","ocene"=>array(6,7,8,9)],
    ["ime"=>"Marko","prezime"=>"Markovic","godiste"=>"2005","ocene"=>array(6,8,8,8)],
    ["ime"=>"Jelena","prezime"=>"Markovic","godiste"=>"2001","ocene"=>array(6,7,10,10)],
    ["ime"=>"Marko","prezime"=>"Mirkovic","godiste"=>"2003","ocene"=>array(6,9,9,8)],


];



?>

<html>

<head></head>

<body>

<?php

if($a>0)
{
?>
    <h1>Promenjiva a je veca od 0</h1>
<?php
}
else
{
?>
    <p>Promenjiva a nije veca od 0</p>
<?php
}
?>

<ul>

<?php

foreach($niz as $pom)
{
?>
<li> <?= $pom ?> </li>

<?php

}

?>
</ul>


<table border="2">

<tr>

<th>Ime</th>
<th>Prezime</th>
<th>Godiste</th>
<th>Ocene</th>

</tr>

<?php foreach($osobe as $pom) 
{
?>
<tr>

<td> <?= $pom["ime"] ?> </td>
<td> <?= $pom["prezime"] ?> </td>
<td> <?= $pom["godiste"] ?> </td>
<td> <?= implode(", ",$pom["ocene"]) ?> </td>

</tr>

<?php  

}
?>


</table>


</body>


</html>

