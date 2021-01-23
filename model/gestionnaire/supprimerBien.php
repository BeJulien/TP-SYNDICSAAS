<?php


require_once('../../classes/DAO_Biens.php');


if(isset($_POST['idBien'])){
	$idBien = $_POST['idBien'];
	echo $idBien;
	$deleteBien = new DAOBiens;
	$deleteBien->deleteBien($idBien);
}


?>