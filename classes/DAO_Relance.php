<?php
require_once("DTO_Relance.php");
require_once("DAO_Class.php");

/**
 * Classe permettant l'envoi de requêtes sur la BDD dans la table relancepaiement
 * et qui renvoie un objet "Relance" au code PHP
 */
class DAORelance extends DAO
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Récupération d'une copropriété selon son ID
	function getById($ID) 
	{

		$sql = "SELECT * FROM relancepaiement WHERE id = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));
		
		$donnee = $requete->fetch();

		if ($donnee == false){
			return false;

		} else {
			$relance = new Relance($donnee["ID"],$donnee["DateEnvoi"], $donnee["IdEcheance"]);
			return $relance;
		}
	}

	function creerRelance($idEcheance,$dateEnvoi){
		echo $idEcheance;
		echo $dateEnvoi;
		$sql = "INSERT INTO relancepaiement (DateEnvoi,IdEcheance) VALUES (?,?)";

		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($dateEnvoi,$idEcheance));

	}
		
}



?>