<?php 

//Récupérer type d'échéance
if($_SESSION['idCopropriete']){
	require_once('classes/DAO_Copropriete.php');
	require_once('classes/DAO_Budget.php');
	require_once('classes/DAO_RemonteeInformations.php');
	require_once('classes/DAO_Echeance.php');

	//Récupérer type echeance de la copropriete
	$copropriete = new DAOCopropriete();
	$typeEcheance = $copropriete->getEcheance($_SESSION['idCopropriete']);

	//Récupérer budget de la copropriété
	$budget = new DAOBudget();
	$budget = $budget->getByCopropriete($_SESSION['idCopropriete']);


	//Récupérer remontées d'informations
	$information = new DAORemonteeInformations();
	$remonteesTab = $information->getByCopropriete($_SESSION['idCopropriete']);
	//var_dump($remonteesTab);

	//Récupérer retards de paiement
	$retard = new DAOEcheance();
	$retardTab = $retard->getAllUnpaidEcheanceByCopropriete($_SESSION['idCopropriete']);
	//var_dump($retardTab);
}



?>