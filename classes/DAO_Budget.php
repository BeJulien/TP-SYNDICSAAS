<?php

require_once("DTO_Budget.php");
require_once("DAO_Class.php");

/**
 * Classe permettant l'envoi de requêtes sur la BDD dans la table budget
 * et qui renvoie un objet "Budget" au code PHP
 */
class DAOBudget extends DAO
{
	
	function __construct()
	{
		parent::__construct();
	}


	// Récupération d'un budget selon son ID
	function getById($ID) 
	{

		$sql = "SELECT * FROM budget WHERE id = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));
		
		$donnee = $requete->fetch();

		if ($donnee == false){
			return false;

		} else {
			$budget = new Budget($donnee["ID"],$donnee["Somme"],$donnee["Annee"], $donnee["IdCopropriete"]);
			return $budget;
		}
	}

	function getByCopropriete($IdCopropriete){
		$year = date('Y');
		$sql = "SELECT Somme FROM budget WHERE Annee = ? AND IdCopropriete = ? ;";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($year,$IdCopropriete));
		
		$donnee = $requete->fetch();

		if ($donnee == false){
			return false;

		} else {
			return $donnee["Somme"];
		}

	}


		
}



?>