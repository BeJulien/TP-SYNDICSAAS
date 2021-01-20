<?php
require_once("DTO_Convocation.php");
require_once("DAO_Class.php");

/**
 * Classe permettant l'envoi de requêtes sur la BDD dans la table Convocation
 * et qui renvoie un objet "Convocation" au code PHP
 */
class DAOConvocation extends DAO
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Récupération d'une Convocation selon son ID
	function getById($ID) 
	{

		$sql = "SELECT * FROM convocationsassemblees WHERE id = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));
		
		$donnee = $requete->fetch();

		if ($donnee == false){
			return false;

		} else {
			$convocation = new Convocation($donnee["ID"],$donnee["DateEnvoi"], $donnee["IdCopropriete"], $donnee["DateAssemblee"], $donnee["HeureAssemblee"], $donnee["LieuAssemblee"], $donnee["OrdresDuJour"]); 


			return $convocation;
		}
	}


		
}



?>