<?php
session_start();
require_once("../Classes/DAO_Convocation.php");
require_once("../Classes/DAO_Copropriete.php");
require_once("../Classes/DAO_Coproprietaire.php");
require_once("../Classes/DAO_Gestionnaire.php");
require_once("../Classes/DAO_Echeance.php");
require_once("./GENERATION_Relance.php");


$coproprieteDAO = new DAOCopropriete();
$gestionnaireDAO = new DAOGestionnaire();
$coproprietaireDAO = new DAOCoproprietaire();
$echeancesDAO = new DAOEcheance();


$gestionnaire = $gestionnaireDAO->getById($_SESSION['idUtilisateur']);

$copropriete = $coproprieteDAO->getById($_SESSION['idCopropriete']);

$coproprietaire = $coproprietaireDAO->getById($_GET['idCoproprietaire']);

$tabUnpaidEcheances = $echeancesDAO->getAllUnpaidEcheanceByCoproprietaireId($coproprietaire->id);


	$pdfRelance = new GenerationRelance($copropriete,$coproprietaire,$gestionnaire,$tabUnpaidEcheances);	
	$pdfRelance->genererPDFRelance();




?>