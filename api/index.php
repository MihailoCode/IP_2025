<?php
require 'flight/Flight.php';
require_once '../proizvodjaci/DAOProizvodjaci.php';
require_once '../vozila/DAOVozila.php';

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('GET /vozila', function(){
    $dao = new DAOVozila();
    $response = $dao->getAllVozila();
    echo json_encode($response);
});

Flight::route('GET /vozila/@zemlja_porekla', function($zemlja_porekla){
    $dao = new DAOVozila();
    $response = $dao->getAllVozilaByProizvodjacZP($zemlja_porekla);
    echo json_encode($response);
});

Flight::route('GET /proizvodjaci', function(){
	$dao = new DAOProizvodjaci();
    $response = $dao->getAllProizvodjaci();
    echo json_encode($response);
});

Flight::route('GET /proizvodjaci/@id', function($id){
	$dao = new DAOProizvodjaci();
    $response = $dao->getProizvodjacByID($id);
    echo json_encode($response);
});

Flight::route('DELETE /proizvodjaci/@id', function($id){
	$dao = new DAOProizvodjaci();
    $response = $dao->deleteProizvodjacByID($id);
    echo json_encode($response);
});

Flight::route('POST /proizvodjaci', function(){
    $dao = new DAOProizvodjaci();
    $zemlja_porekla = Flight::request()->data->zemlja_porekla;
    $response = $dao->insertProizvodjaci($zemlja_porekla);
    var_dump($zemlja_porekla);
    echo json_encode($response);
});
    
Flight::route('PUT /proizvodjaci/@id', function($id){
    $dao = new DAOProizvodjaci();
    $zemlja_porekla = Flight::request()->data->zemlja_porekla;
    //$id = Flight::request()->data->id;
    $response = $dao->updateProizvodjaci($zemlja_porekla, $id);
    var_dump($zemlja_porekla);
    var_dump($id); 
    echo json_encode($response);
});

Flight::start();
