<?php

require_once('classes/DAO_Coproprietaire.php');
if($_SESSION['idCopropriete']){

	$identifiant = $_POST['identifiant'];
	$motDePasse = $_POST['motDePasse'];
	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	$adressePostale = $_POST['adressePostale'];
	$cp = $_POST['codePostal'];
	$ville = $_POST['ville'];
	$pays = $_POST['pays'];

	$data = array("identifiant" => $identifiant,"mdp" => $motDePasse,"prenom" => $prenom, "nom" => $nom,
					"email" => $email,"telephone" => $telephone,"adressePostale" => $adressePostale,
					"cp" => $cp,"ville" => $ville,"pays" => $pays,"coproprietaire" => $_GET['id']);

	$modifCoproprietaire = new DAOCoproprietaire;
	$modifCoproprietaire->modifierCoproprietaire($data);
	header("Location: index.php?act=gestionCoproprietaire");
}

?>