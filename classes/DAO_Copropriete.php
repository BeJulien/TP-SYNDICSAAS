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

	function getByGestionnaireID($ID){
        $sql = "SELECT * FROM coproprietes WHERE IdGestionnaire = ?";
        $requete = $this->bdd->prepare($sql);
        $requete->execute(array($ID));

        $listeCopropriete = [];

        //$donnee = $requete->fetch();
        while($donnee = $requete->fetch()){
            if (!$donnee) {
                return false;
            }
            $copropriete = new Copropriete($donnee["ID"],$donnee["Nom"], $donnee["Adresse"], $donnee["CodePostal"], $donnee["Ville"], $donnee["SurfaceTotale"], $donnee["LienImage"], $donnee["IdGestionnaire"], $donnee["IdTypeEcheance"]);
            array_push($listeCopropriete, $copropriete);
        }

        return $listeCopropriete;
    }

	function getAllCoproprietes() {
		$coproprietes = array();

		$sql = "SELECT * FROM coproprietes";
		$requete = $this->bdd->prepare($sql);
		$requete->execute();

		while ($donnee = $requete->fetch(PDO::FETCH_ASSOC)) {
			if (!$donnee) {
				return false;
			}

			$copropriete = new Copropriete($donnee['ID'], $donnee['Nom'], $donnee['Adresse'], $donnee['CodePostal'], $donnee['Ville'], $donnee['SurfaceTotale'], $donnee['LienImage'], $donnee['IdGestionnaire'], $donnee['IdTypeEcheance']);
			$coproprietes[] = $copropriete;
		}

		return $coproprietes;
	}

	function deleteCoproprieteFromId($id) {
		$sql = "DELETE FROM coproprietes WHERE id = ?";
		$requete = $this->bdd->prepare($sql);

		if ($requete->execute(array($id))) {
			return true;
		} else {
			return false;
		}
	}

	function insertCopropriete($copropriete) {
		$nom = $copropriete->nom;
		$adresse = $copropriete->adresse;
		$codePostal = $copropriete->codePostal;
		$ville = $copropriete->ville;
		$surfaceTotale = $copropriete->surfaceTotale;
		$lienImage = $copropriete->lienImage;
		$idGestionnaire = $copropriete->idGestionnaire;
		$idTypeEcheance = $copropriete->idTypeEcheance;

		$sql = "INSERT INTO coproprietes (Nom, Adresse, CodePostal, Ville, "
		       . "SurfaceTotale, LienImage, IdGestionnaire, IdTypeEcheance) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$requete = $this->bdd->prepare($sql);

		if ($requete->execute(array($nom, $adresse, $codePostal, $ville, 
		                            $surfaceTotale, $lienImage, $idGestionnaire, $idTypeEcheance))) {
			return true;
		} else {
			return false;
		}
	}

	function updateCopropriete($copropriete) {
		$id = $copropriete->id;
		$nom = $copropriete->nom;
		$adresse = $copropriete->adresse;
		$codePostal = $copropriete->codePostal;
		$ville = $copropriete->ville;
		$surfaceTotale = $copropriete->surfaceTotale;
		$lienImage = $copropriete->lienImage;
		$idGestionnaire = $copropriete->idGestionnaire;
		$idTypeEcheance = $copropriete->idTypeEcheance;

		$sql = "UPDATE coproprietes SET Nom = ?, Adresse = ?, CodePostal = ?, Ville = ?, "
			   . "SurfaceTotale = ?, LienImage = ?, IdGestionnaire = ?, IdTypeEcheance = ? WHERE ID = ?";
		$requete = $this->bdd->prepare($sql);

		if ($requete->execute(array($nom, $adresse, $codePostal, $ville, 
								    $surfaceTotale, $lienImage, $idGestionnaire, $idTypeEcheance, $id))) {
			return true;
		} else {
			return false;
		}
	}

	//JOHAN DIMANCHE

	function getEcheance($idCopropriete){
		$sql = "SELECT Libelle FROM typeecheance t, coproprietes c WHERE c.IdTypeEcheance = t.ID AND c.ID = ? ;";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($idCopropriete));
		
		$donnee = $requete->fetch();
		if ($donnee == false){
			return "Erreur";

		} else {
			return $donnee['Libelle'];
		}

	}

	function modifierBudget($idCopropriete,$budget){
		$year = date('Y');

		$sql = "SELECT Somme FROM budget WHERE IdCopropriete = ? AND Annee = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($idCopropriete,$year));
		$donnee = $requete->fetch();
		if($donnee == false){
			$copropriete = new DAOCopropriete();
			$copropriete->creerBudget($idCopropriete,$budget);
		}
		elseif ($budget != $donnee['Somme']) {
			$sqlUpdate = "UPDATE budget SET Somme = ? WHERE IdCopropriete = ? AND Annee = ? ;";
			$requete = $this->bdd->prepare($sqlUpdate);
			$requete->execute(array($budget, $idCopropriete,$year));
		}
	}

	function creerBudget($idCopropriete,$budget){
		$year = date('Y');

		$sqlInsert = "INSERT INTO budget (Somme,Annee,IdCopropriete) VALUES (?,?,?) ;";
		$requete = $this->bdd->prepare($sqlInsert);

		if ($requete->execute(array($budget,$year,$idCopropriete))) {
			return true;
		} else {
			return false;
		}
	}
		
}



?>