<?php


require_once('../../classes/DAO_Coproprietaire.php');


if(isset($_POST['idCoproprietaire'])){
	$idCoproprietaire = $_POST['idCoproprietaire'];
	$deleteCoproprietaite = new DAOCoproprietaire;
	$deleteCoproprietaite->deleteCoproprietaire($idCoproprietaire);
}



?>
