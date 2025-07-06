<?php
require_once 'ControllerProizvodjaci.php';

$action = isset($_REQUEST['action'])? $_REQUEST['action'] : "all";

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action) {
            case "all":
                $pc = new ControllerProizvodjaci();
                
                $pc->getAll();
                break;
         }
        break;
    case "POST":
        switch ($action) {
          //...
        }
        break;
    default:
        header("Location:../index.php");
        die();
        break;
}
?>