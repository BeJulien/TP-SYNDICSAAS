<?php
require_once("DTO_Gestionnaire.php");
require_once("DAO_Class.php");

/**
 * Classe permettant l'envoi de requêtes sur la BDD dans la table Utilisateurs
 * et qui renvoie un objet "Gestionnaire" au code PHP
 */
class DAOGestionnaire extends DAO
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Récupération d'un Gestionnaire dans la table Utilisateurs selon son ID
	function getById($ID) 
	{

		$sql = "SELECT * FROM utilisateurs WHERE id = ? AND idRole = 2";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));
		
		$donnee = $requete->fetch();

		if ($donnee == false){
			return false;

		} else {
			$gestionnaire = new Gestionnaire($donnee["ID"],$donnee["Nom"], $donnee["Prénom"], $donnee["Adresse"], $donnee["CodePostal"], $donnee["Ville"], $donnee["Pays"], $donnee["NumeroTelephone"], $donnee["Mail"], $donnee["Login"], $donnee["MotDePasse"],$donnee["IdRole"], $donnee["IdAdmin"]);
			return $gestionnaire;
		}
	}

	//Verification connexion d'un gestionnaire idRole = 2 pour le gestionnaire
	function verifLogin($login, $mdp){
		$sql = "SELECT * FROM utilisateurs WHERE login = ? AND MotDePasse = ? AND idRole = 2;";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($login, $mdp));
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