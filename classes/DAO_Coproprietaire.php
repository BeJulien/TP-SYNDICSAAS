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

		$sql = "SELECT * FROM utilisateurs WHERE id = ? AND idRole = 3";
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
		$sql = "SELECT * FROM utilisateurs WHERE login = ? AND MotDePasse = ? AND idRole = 3;";
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

	// Récupère l'identifiant du copropriétaire connecté
	function getIdFromLogin($login) {
		$sql = "SELECT id FROM utilisateurs WHERE login = ? AND idRole = 3";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($login));
		$donnee = $requete->fetch();

		if ($donnee == false) {
			return false;
		} else {
			return $donnee["id"];
		}
	}

	function getByCoproprieteID($ID){
		$sql = "SELECT * FROM utilisateurs WHERE IdCopropriete = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));

		$listeCoproprietaire = [];

		//$donnee = $requete->fetch();
		while($donnee = $requete->fetch()){
			if (!$donnee) {
                return false;
            }
			$coproprietaire = new Coproprietaire($donnee["ID"],$donnee["Nom"], $donnee["Prénom"], $donnee["Adresse"], $donnee["CodePostal"], $donnee["Ville"], $donnee["Pays"], $donnee["NumeroTelephone"], $donnee["Mail"], $donnee["Login"], $donnee["MotDePasse"],$donnee["IdRole"], $donnee["IdCopropriete"]);
			array_push($listeCoproprietaire, $coproprietaire);
		}

		return $listeCoproprietaire;
	}

	function createCoproprietaire($data){

		$sql = "INSERT INTO `utilisateurs`(`Nom`, `Prénom`, `Adresse`, `CodePostal`, `Ville`, `Pays`,
										 `NumeroTelephone`, `Mail`, `Login`, `MotDePasse`, `IdRole`, `IdCopropriete`)

		VALUES (?,?,?,?,?,?,?,?,?,?,3,?)";
		$requete = $this->bdd->prepare($sql);
		echo $data['nom'];
		if ($requete->execute(array($data['nom'], $data['prenom'], $data['adressePostale'], $data['cp'], 
									$data['ville'], $data['pays'],$data['telephone'], $data['email'],
									 $data['identifiant'], $data['mdp'],$data['copropriete']))) {
            return true;
        } else {
            return false;
        }
	}

	function modifierCoproprietaire($data){
		echo "test";
		$sql =  "UPDATE utilisateurs 
				SET Nom = ?, Prénom = ?, Adresse = ?, CodePostal = ?,
				Ville = ?, Pays = ?, NumeroTelephone = ?, Mail = ?, Login = ?, MotDePasse = ? 
				WHERE ID = ? ";
		$requete = $this->bdd->prepare($sql);
		if ($requete->execute(array($data['nom'], $data['prenom'], $data['adressePostale'], $data['cp'], 
									$data['ville'], $data['pays'],$data['telephone'], $data['email'],
									 $data['identifiant'], $data['mdp'],$data['coproprietaire']))) {
            return true;
        } else {
            return false;
        }
	}

	function deleteCoproprietaire($ID){
		$sql = "DELETE FROM utilisateurs WHERE ID = ? ";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));
	}
		
}



?>