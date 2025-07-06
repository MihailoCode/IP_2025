<?php
require 'DAOVozila.php';
require '../proizvodjaci/ControllerProizvodjaci.php';

class ControllerVozila {

    function getAll() {
        $dao1 = new DAOVozila();
        $vozila = $dao1->getAllVozila();
        $pc = new ControllerProizvodjaci();
        $proizvodjaci = $pc->getAllForVozila();
        include '../vozila/viewPrikazSvihVozila.php';
        
    }
    
    function getAllByProizvodjac() {
        $id = isset($_GET['id'])? $_GET['id'] : "";
        $dao1 = new DAOVozila();
        $vozila = $dao1->getAllVozilaByProizvodjac($id);
        $pc = new ControllerProizvodjaci();
        $proizvodjaci = $pc->getAllForVozila();
        include '../vozila/viewPrikazSvihVozila.php';
    }
    
    function dinamicProizvodjaci() {
        $pc = new ControllerProizvodjaci();
        $proizvodjaci = $pc->getAllForVozila();
        include '../vozila/viewUnosVozila.php';
    }
    
    function unesiVozilo() {
        $marka = isset($_POST['marka'])? $_POST['marka'] : "";
        $cena = isset($_POST['cena'])? $_POST['cena'] : "";
        $godiste = isset($_POST['godiste'])? $_POST['godiste'] : "";
        $id_proizvodjaca = isset($_POST['id_proizvodjaca'])? $_POST['id_proizvodjaca'] : "";
        
        if (!empty($marka) && !empty($cena) && !empty($godiste) && !empty($id_proizvodjaca)) {
            if (is_numeric($cena) && is_numeric($godiste)) {
                $pc = new ControllerProizvodjaci();
                $proizvodjaci = $pc->getAllForVozila();
                $dao = new DAOVozila();
                $vozilo = $dao->insertVozila($marka, $cena, $godiste, $id_proizvodjaca);
                $vozila = $dao->getAllVozila();
                include '../vozila/viewPrikazSvihVozila.php';
            } else {
                $msg = "Godiste i cena moraju biti brojevi";
                include '../vozila/viewUnosVozila.php';
            }
        } else {
            $msg = "Morate popuniti sva polja";
            include '../vozila/viewUnosVozila.php';
        }
    }
}
?>