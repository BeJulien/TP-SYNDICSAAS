<?php

include('view/gestionnaireView/headerGestionnaire.php');
//echo $_SESSION['idUtilisateur'];

if(isset($_SESSION['idCopropriete'])){
	//echo $_SESSION['idCopropriete'];
}else{
	echo "choisir un copropriété";
}



if(isset($_GET['act'])){
	$act = $_GET['act'];

switch ($act) {

	case 'accueil':
		include('view/gestionnaireView/accueil.php');
		break;

	default:
		include('view/gestionnaireView/accueil.php');
		break;

	/* GESTION COPROPRIETAIRES */

	case 'gestionCoproprietaire':
		include('model/gestionnaire/getCoproprietaire.php');
		include('view/gestionnaireView/gestionCoproprietaireTab.php');
		break;

	case 'ajouterCoproprietaireForm':
		include('view/gestionnaireView/ajouterCoproprietaireForm.php');
		break;

	case 'creerCoproprietaire':
		include('model/gestionnaire/creerCoproprietaire.php');
		break;

	case 'modifierCoproprietaireForm':
		include('model/gestionnaire/modifierCoproprietaireForm.php');
		include('view/gestionnaireView/modifierCoproprietaireForm.php');
		break;

	case 'modifierCoproprietaire':
		include('model/gestionnaire/modifierCoproprietaire.php');
		break;

	/* GESTION BIENS */	

	case 'gestionBiens':
		include('model/gestionnaire/getBiens.php');
		include('view/gestionnaireView/gestionLotTab.php');
		break;

	case 'ajouterBienForm':
		include('model/gestionnaire/getCoproprietaire.php');
		include('view/gestionnaireView/ajouterBienForm.php');
		break;

	case 'creerBien':
		include('model/gestionnaire/creerBien.php');
		break;

	case 'modifierBien':
		include('model/gestionnaire/modifierBien.php');
		break;

	case 'modifierBienForm':
		include('model/gestionnaire/getCoproprietaire.php');
		include('model/gestionnaire/modifierBienForm.php');
		include('view/gestionnaireView/modifierBienForm.php');
		break;

	/* GESTION COPROPRIETE */	

	case 'changerCopropriete':
		include('model/gestionnaire/getCopropriete.php');
		include('view/gestionnaireView/changerCopropriete.php');
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