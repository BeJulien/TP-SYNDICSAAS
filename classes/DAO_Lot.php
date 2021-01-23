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

	//Récuper par la copropriete et le coproprietaire
	function getByCoproprietaire($coproprietaire,$copropriete){
		$sql = "SELECT l.ID FROM lots l, biens b WHERE b.IdLot = l.ID AND l.IdCopropriete = ? AND b.IdProprietaire = ? ;";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($copropriete,$coproprietaire));
		$donnee = $requete->fetch();

		if ($donnee == false){
			$lot =  new DAOLot();
			$lotId = $lot->getNewId();
			$lot->newLot($copropriete);
			return $lotId;	
		} else {
			return $donnee["ID"];
		}
	}

	function newLot($copropriete){
		$sql = 'INSERT INTO lots (Idcopropriete) VALUES (?)';
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($copropriete));
	}

	//Retourner nouveaux lot increment d'une copropriété
	function getNewId(){

		$sql = "SHOW TABLE STATUS WHERE name ='lots'";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array());
		$donnee = $requete->fetch();
		return $donnee['Auto_increment'];
	}

}


?>