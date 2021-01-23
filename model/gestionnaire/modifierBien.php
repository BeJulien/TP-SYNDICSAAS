<?php

require_once('classes/DAO_Biens.php');
if($_SESSION['idCopropriete']){

	$proprietaire = $_POST['proprietaire'];
	$type = $_POST['type'];
	$description = $_POST['description'];
	$surface = $_POST['surface'];

	echo $description;

	$data = array("proprietaire" => $proprietaire,"type" => $type,"description" => $description, "surface" => $surface,
				 "idBien" => $_GET['id']);

	$modifBien = new DAOBiens;
	$result = $modifBien->modifierBien($data);
	var_dump($result);
	//header("Location: index.php?act=gestionBiens");
}

?>