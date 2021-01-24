<?php
session_start();

if(isset($_SESSION['idCopropriete'])){
	
	require_once('../../classes/DAO_Relance.php');

	$idEcheance = $_POST['idEcheance'];
	$dateEnvoi = date('Y-m-d H:i:s');

	$relance = new DAORelance();
	$relance->creerRelance($idEcheance,$dateEnvoi);

	//header("Location: index.php?act=gestionCopropriete");
}

?>