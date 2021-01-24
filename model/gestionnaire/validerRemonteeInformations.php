<?php 
session_start();
require_once('../../classes/DAO_RemonteeInformations.php');
//VALIDER UNE REMONTEE D'INFORMATION
if(isset($_SESSION['idCopropriete']) && isset($_POST['idRemontee'])){
	$idRemontee = $_POST['idRemontee'];
	echo 'NB-> '.$_POST['idRemontee'];
	$remontee = new DAORemonteeInformations();
	$remontee->validerRemontee($idRemontee);
}

?>