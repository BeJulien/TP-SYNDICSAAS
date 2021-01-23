<?php

if($_SESSION['idCopropriete']){
	require_once('classes/DAO_Biens.php');
	require_once('classes/DAO_Lot.php');
	$proprietaire = $_POST['proprietaire'];
	$type = $_POST['type'];
	$description = $_POST['description'];
	$surface = $_POST['surface'];

	$lot = new DAOLot();
	$lot = $lot->getByCoproprietaire($proprietaire,$_SESSION['idCopropriete']);

	$data = array("proprietaire" => $proprietaire,"type" => $type,"description" => $description, "surface" => $surface
				, "copropriete" => $_SESSION['idCopropriete'], "lot" => $lot);

	$NewBien = new DAOBiens;
	$NewBien->createBien($data);
	header("Location: index.php?act=gestionBiens");
}

?>