<?php

if(isset($_GET['act'])){
	$act = $_GET['act'];
}

include('view/gestionnaireView/headerGestionnaire.php');

switch ($act) {
	case 'gestionCoproprietaire':
		include('view/gestionnaireView/gestionCoproprietaireTab.php');
		break;

	case 'gestionBiens':
		include('view/gestionnaireView/gestionLotTab.php');
		break;

	case 'gestionCopropriete':
		include('view/gestionnaireView/gestionCopropriete.php');
		break;
}

include('view/gestionnaireView/CoproprieteModal.php');
?>