<?php

require_once 'ControllerVozila.php';

$action = isset($_REQUEST['action'])? $_REQUEST['action'] : "all";

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action) {
            case "all":
                $vc = new ControllerVozila();
                
                $vc->getAll();
                
                break;
            case "Sortiraj":
                $vc = new ControllerVozila();
                $vc->getAllByProizvodjac();
                
                break;
            case "insertnew":
                $vc = new ControllerVozila();
                $vc->dinamicProizvodjaci();
                
                break;
        }
        break;
    case "POST":
        switch ($action) {
            case "Unesi":
                $vc = new ControllerVozila();
                $vc->unesiVozilo();
                
            break;
        }
        break;
    default:
        header("Location:index.php");
        die();
        break;
}
?>