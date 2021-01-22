<?php

include('view/gestionnaireView/headerGestionnaire.php');
echo $_SESSION['role'];
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

	case 'deconnexion':
		session_unset();
		session_destroy();
		header('Location: index.php');
		break;
}
}
?>