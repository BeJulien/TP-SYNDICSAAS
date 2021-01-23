<?php 
if(isset($_SESSION['idCopropriete']) && isset($_GET['id'])){

	require_once('classes/DAO_Coproprietaire.php');
	$modifCoproprietaire = new DAOCoproprietaire;
	$modifcoproprietaire = $modifCoproprietaire->getById($_GET['id']);

	//Variables de base du copropriétaire à afficher dans les inputs
	$identifiantForm = $modifcoproprietaire->login;
	$motDePasseForm = $modifcoproprietaire->motDePasse;
	$prenomForm = $modifcoproprietaire->prenom;
	$nomForm = $modifcoproprietaire->nom;
	$emailForm = $modifcoproprietaire->mail;
	$telForm = $modifcoproprietaire->numeroTelephone;
	$adresseForm = $modifcoproprietaire->adresse;
	$cpForm = $modifcoproprietaire->codePostal;
	$villeForm = $modifcoproprietaire->ville;
	$paysForm = $modifcoproprietaire->pays;
}

?>