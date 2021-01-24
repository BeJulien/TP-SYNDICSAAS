<?php 

if(isset($_SESSION['idCopropriete']) && isset($_POST['budget'])){

	require_once('classes/DAO_Copropriete.php');
	$copropriete = new DAOCopropriete();
	$response = $copropriete->modifierBudget($_SESSION['idCopropriete'],$_POST['budget']);
	header("Location: index.php?act=gestionCopropriete");
}
?>