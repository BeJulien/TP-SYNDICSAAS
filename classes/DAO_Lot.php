<?php
require_once("DTO_Lot.php");
require_once("DAO_Class.php");

/**
 * Classe permettant l'envoi de requêtes sur la BDD dans la table Lot
 * et qui renvoie un objet "Lot" au code PHP
 */
class DAOLot extends DAO
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Récupération d'un lot selon son ID
	function getById($ID) 
	{

		$sql = "SELECT * FROM lots WHERE id = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));
		
		$donnee = $requete->fetch();

		if ($donnee == false){
			return false;

		} else {
			$lot = new Lot($donnee["ID"],$donnee["IdCopropriete"]);
			return $lot;
		}
	}

}


?>