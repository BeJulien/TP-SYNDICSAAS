<?php

include('view/adminView/headerAdmin.php');

echo $_SESSION['role'];
if(isset($_GET['act'])){
	$act = $_GET['act'];

switch ($act) {

	case 'gestionGestionnaire':
		include('view/adminView/gestionGestionnaireTab.php');
		break;

	case 'gestionCopropriete':
		include('view/adminView/gestionCoproprieteTab.php');
		break;

	case 'deconnexion':
		session_unset();
		session_destroy();
		header('Location: index.php');
		break;
}
}
?>