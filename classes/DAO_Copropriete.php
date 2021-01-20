<?php
require_once("DTO_Copropriete.php");
require_once("DAO_Class.php");

/**
 * Classe permettant l'envoi de requêtes sur la BDD dans la table Coproriete
 * et qui renvoie un objet "Copropriete" au code PHP
 */
class DAOCopropriete extends DAO
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Récupération d'une copropriété selon son ID
	function getById($ID) 
	{

		$sql = "SELECT * FROM coproprietes WHERE id = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));
		
		$donnee = $requete->fetch();

		if ($donnee == false){
			return false;

		} else {
			$copropriete = new Copropriete($donnee["ID"],$donnee["Nom"], $donnee["Adresse"], $donnee["CodePostal"], $donnee["Ville"], $donnee["SurfaceTotale"], $donnee["LienImage"], $donnee["IdGestionnaire"], $donnee["IdTypeEcheance"]);
			return $copropriete;
		}
	}
		
}



?>