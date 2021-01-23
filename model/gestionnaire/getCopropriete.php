<?php

//Récupérer les copropriétés auxquelles le gestionnaire est affecté
if($_SESSION['idUtilisateur']){
	require_once('classes/DAO_Copropriete.php');
	$copropriete = new DAOCopropriete();
	$listeCopropriete = $copropriete->getByGestionnaireID($_SESSION['idUtilisateur']);
}

?>