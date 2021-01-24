<?php

if($_SESSION['idCopropriete']){
	require_once('classes/DAO_Convocation.php');

	$lieu = $_POST['lieu'];
	$ordres = $_POST['ordres'];
	$date = $_POST['date'];
	$heure = $_POST['heure'];
	
	$data = array("lieu" => $lieu,"ordres" => $ordres,"date" => $date, "heure" => $heure,"copropriete" => $_SESSION['idCopropriete']);
	$convocation = new DAOConvocation();
	$convocation->creerConvocation($data);

	header("Location: index.php?act=gestionConvocation");
}


?>