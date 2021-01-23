<?php

//Récupérer les copropriétaires de la copropriété en cours
if($_SESSION['idCopropriete']){
	require_once('classes/DAO_Coproprietaire.php');
	$coproprietaire = new DAOCoproprietaire();
	$listeCoproprietaire = $coproprietaire->getByCoproprieteID($_SESSION['idCopropriete']);
}

?>