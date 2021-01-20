<?php
require_once("DTO_Coproprietaire.php");
require_once("DAO_Class.php");

/**
 * Classe permettant l'envoi de requêtes sur la BDD dans la table Utilisateurs
 * et qui renvoie un objet "Coproprietaire" au code PHP
 */
class DAOCoproprietaire extends DAO
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Récupération d'un copropriétaire dans la table "Utilisateurs" selon son ID
	function getById($ID) 
	{

		$sql = "SELECT * FROM utilisateurs WHERE id = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));
		
		$donnee = $requete->fetch();

		if ($donnee == false){
			return false;

		} else {
			$coproprietaire = new Coproprietaire($donnee["ID"],$donnee["Nom"], $donnee["Prénom"], $donnee["Adresse"], $donnee["CodePostal"], $donnee["Ville"], $donnee["Pays"], $donnee["NumeroTelephone"], $donnee["Mail"], $donnee["Login"], $donnee["MotDePasse"],$donnee["IdRole"], $donnee["IdCopropriete"]);
			return $coproprietaire;
		}
	}

	//Verification connexion d'un coproprietaire idRole = 3 pour le coproprietaire
	function verifLogin($login, $mdp){
		$sql = "SELECT * FROM utilisateurs WHERE login = '".$login."' AND MotDePasse = '".$mdp."' AND idRole = '3';";
		$requete = $this->bdd->prepare($sql);
		$requete->execute();
		$donnee = $requete->fetch();

		if($donnee == false){
			return false;
		}
		else{
			return true;
		}
	}
		
}



?>