<?php

//Récupérer les biens de la copropriété en cours
if($_SESSION['idCopropriete']){
	require_once('classes/DAO_Biens.php');
	require_once('classes/DAO_Coproprietaire.php');
	$biens = new DAOBiens();
	$listeBiens = $biens->getByCoproprieteID($_SESSION['idCopropriete']);
}

?>