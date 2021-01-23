<?php 
if(isset($_SESSION['idCopropriete']) && isset($_GET['id'])){

	require_once('classes/DAO_Biens.php');
	$modifBien = new DAOBiens;
	$modifBien = $modifBien->getById($_GET['id']);

	//Variables de base du copropriétaire à afficher dans les inputs
	$proprietaireForm = $modifBien->idProprietaire;
	$typeForm = $modifBien->type;
	$descriptionForm = $modifBien->description;
	$surfaceForm = $modifBien->surface;
}

?>