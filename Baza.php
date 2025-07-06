<?php
require_once 'Osoba.php';
session_start();
//var_dump($_SESSION);
if(!isset($_SESSION['osobe'])) $_SESSION['osobe'] = array(
    new Osoba(1, "Marko", "Markovic", 2000),
    new Osoba(2,"Ivan", "Ivanovic", 1985),
    new Osoba(3, "Jovan", "Jovanovic", 2003),
    new Osoba(4,"Darko", "Darkovic", 1978)
);

if(!isset($_SESSION['id'])) $_SESSION['id'] = count($_SESSION['osobe']);

?>