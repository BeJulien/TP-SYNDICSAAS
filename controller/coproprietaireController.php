<?php

include('view/coproprietaireView/headerCoproprietaire.php');


if(isset($_GET['act'])){
	$act = $_GET['act'];

switch ($act) {

	case 'deconnexion':
		session_unset();
		session_destroy();
		header('Location: index.php');
		break;
}
}
?>