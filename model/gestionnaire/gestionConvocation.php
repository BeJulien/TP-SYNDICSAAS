<?php 


if($_SESSION['idCopropriete']){
	require_once('classes/DAO_Convocation.php');

	$convocation = new DAOConvocation();
	$listeConvocation = $convocation->getByCopropriete($_SESSION['idCopropriete']);
}

?>