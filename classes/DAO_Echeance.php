<?php
require_once("DTO_Echeance.php");
require_once("DAO_Class.php");

/**
 * Classe permettant l'envoi de requêtes sur la BDD dans la table echeancesaregler
 * et qui renvoie un objet "Echeance" au code PHP
 */
class DAOEcheance extends DAO
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Récupération d'1 échéance dans la BDD selon son ID et renvoie un objet Echeance
	function getById($ID) 
	{

		$sql = "SELECT * FROM echeancesaregler WHERE id = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));
		
		$donnee = $requete->fetch();

		if ($donnee == false){
			return false;

		} else {
			$echeance = new Echeance($donnee["ID"],$donnee["SommeARegler"], $donnee["DateLimitePaiement"], $donnee["IdProprietaire"], $donnee["IdBudget"], $donnee["IdLot"],$donnee["ReglementEffectue"],$donnee["DateReglement"]);
			

			return $echeance;
		}
	}

	// Récupération de toutes les échéances concernant 1 copropriétaire et renvoie un tableau d'objet Echeances
	function getAllEcheanceByCoproprietaireId($IDCoproprietaire) 
	{
		$arrayEcheancier = array();
		$sql = "SELECT * FROM echeancesaregler WHERE IdProprietaire = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($IDCoproprietaire));

		while($donnee = $requete->fetch(PDO::FETCH_ASSOC)) {
			if (!$donnee) {
				return false;
			}
			$echeance = new Echeance($donnee["ID"],$donnee["SommeARegler"], $donnee["DateLimitePaiement"], $donnee["IdProprietaire"], $donnee["IdBudget"], $donnee["IdLot"],$donnee["ReglementEffectue"],$donnee["DateReglement"]);
			$arrayEcheancier[] = $echeance;
		}

			return $arrayEcheancier;
	}


	// Récupération de toutes les échéances non payées d'un copropriétaire
	function getAllUnpaidEcheanceByCoproprietaireId($IDCoproprietaire)
	{
		$arrayUnpaidEcheance = array();
		$sql = "SELECT * FROM echeancesaregler WHERE DateReglement is NULL AND DateLimitePaiement < NOW() AND IdProprietaire = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($IDCoproprietaire));


		while($donnee = $requete->fetch(PDO::FETCH_ASSOC)) {
						if (!$donnee) {
				return false;
			}
			$echeance = new Echeance($donnee["ID"],$donnee["SommeARegler"], $donnee["DateLimitePaiement"], $donnee["IdProprietaire"], $donnee["IdBudget"], $donnee["IdLot"],$donnee["ReglementEffectue"],$donnee["DateReglement"]);
			$arrayUnpaidEcheance[] = $echeance;
		}

			return $arrayUnpaidEcheance;
	}

	function getAllUnpaidEcheanceByCopropriete($IdCopropriete){

		$sql = "SELECT e.ID,SommeARegler,nom,prénom,u.ID
				FROM utilisateurs u, echeancesaregler e
				WHERE IdProprietaire = u.ID
				AND DateReglement is NULL AND DateLimitePaiement < NOW()
				AND u.IdCopropriete = ?";

		$requete = $this->bdd->prepare($sql);
        $requete->execute(array($IdCopropriete));
        $listeRetard = [];

		while ($donnee = $requete->fetch()) {
			if (!$donnee) {
			    return false;
			}
			//var_dump($donnee);
			$relance = new DAOEcheance();
			$relance = $relance->getRelanceByEcheance($donnee['ID']);

			$retard = array("id" => $donnee['0'],"SommeARegler" => $donnee['SommeARegler'],
			            "idCoproprietaire" => $donnee['4'],"nom" => $donnee['nom'], "prenom" => $donnee['prénom'],"relance" => $relance);
			array_push($listeRetard, $retard);
		}
		return $listeRetard;
	}

	function getRelanceByEcheance($idEcheance){
		$sql = "SELECT r.ID FROM relancepaiement r, echeancesaregler e
				WHERE r.IdEcheance = e.ID AND r.IdEcheance = ?";
		$requete = $this->bdd->prepare($sql);
        $requete->execute(array($idEcheance));
        $donnee = $requete->fetch();
        if ($donnee == false){
			return false;
		}
		else{
			return true;
		}
	}


		
}



?>