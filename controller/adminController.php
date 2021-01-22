<?php

include('view/adminView/headerAdmin.php');

if(isset($_GET['act'])){
	$act = $_GET['act'];

switch ($act) {

	case 'accueil':
		include('view/adminView/accueil.php');
		break;
	
	case 'gestionGestionnaire':
		include('view/adminView/gestionGestionnaireTab.php');
		break;

	case 'gestionCopropriete':
		include('view/adminView/gestionCoproprieteTab.php');
		break;

	case 'ajouterGestionnaireForm':
		include('view/adminView/ajouterGestionnaireForm.php');
		break;

	case 'modifierGestionnaireForm':
		include('view/adminView/modifierGestionnaireForm.php');
		break;

	case 'ajouterCoproprieteForm':
		include('view/adminView/ajouterCoproprieteForm.php');
		break;

	case 'modifierCoproprieteForm':
		include('view/adminView/modifierCoproprieteForm.php');
		break;

	case 'deconnexion':
		session_unset();
		session_destroy();
		header('Location: index.php');
		break;
}
}
?>