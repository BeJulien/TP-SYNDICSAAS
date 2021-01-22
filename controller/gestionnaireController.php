<?php

include('view/gestionnaireView/headerGestionnaire.php');

if(isset($_GET['act'])){
	$act = $_GET['act'];

switch ($act) {

	case 'accueil':
		include('view/gestionnaireView/accueil.php');
		break;

	case 'gestionCoproprietaire':
		include('view/gestionnaireView/gestionCoproprietaireTab.php');
		break;

	case 'gestionBiens':
		include('view/gestionnaireView/gestionLotTab.php');
		break;

	case 'gestionCopropriete':
		include('view/gestionnaireView/gestionCopropriete.php');
		break;

	case 'ajouterCoproprietaireForm':
		include('view/gestionnaireView/ajouterCoproprietaireForm.php');
		break;

	case 'modifierCoproprietaireForm':
		include('view/gestionnaireView/modifierCoproprietaireForm.php');
		break;

	case 'ajouterBienForm':
		include('view/gestionnaireView/ajouterBienForm.php');
		break;	

	case 'modifierBienForm':
		include('view/gestionnaireView/modifierBienForm.php');
		break;

	case 'deconnexion':
		session_unset();
		session_destroy();
		header('Location: index.php');
		break;
}
}
?>