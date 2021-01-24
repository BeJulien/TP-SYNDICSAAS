<?php

include('view/coproprietaireView/headerCoproprietaire.php');


if(isset($_GET['act'])){
	$act = $_GET['act'];

switch ($act) {

	case 'accueil':
		include('view/coproprietaireView/accueil.php');
		break;

	case 'remonteeInformation':
		include('view/coproprietaireView/remonteeInformation.php');
		break;
	
	case 'deconnexion':
		session_unset();
		session_destroy();
		header('Location: index.php');
		break;
}
}
?>