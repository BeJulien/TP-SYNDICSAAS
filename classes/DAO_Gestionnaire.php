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

		$sql = "SELECT * FROM utilisateurs WHERE ID = ? AND IdRole = 2";
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
		$sql = "SELECT * FROM utilisateurs WHERE login = ? AND MotDePasse = ? AND IdRole = 2;";
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

	// Récupère l'identifiant du gestionnaire connecté
	function getIdFromLogin($login) {
		$sql = "SELECT id FROM utilisateurs WHERE Login = ? AND IdRole = 2";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($login));
		$donnee = $requete->fetch();

		if ($donnee == false) {
			return false;
		} else {
			return $donnee["id"];
		}
	}

	// Récupère tous les gestionnaires liés à un administrateur.
	function getAllGestionnairesFromIdAdmin($idAdmin) {
		$gestionnaires = array();

		$sql = "SELECT * FROM v_all_gestionnaires WHERE IdAdmin = ? AND IdRole = 2";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($idAdmin));

		while ($donnee = $requete->fetch(PDO::FETCH_ASSOC)) {
			if (!$donnee) {
				return false;
			}

			$gestionnaire = new Gestionnaire($donnee["ID"],$donnee["Nom"], $donnee["Prénom"], $donnee["Adresse"], $donnee["CodePostal"], $donnee["Ville"], $donnee["Pays"], $donnee["NumeroTelephone"], $donnee["Mail"], $donnee["Login"], $donnee["MotDePasse"],$donnee["IdRole"], $donnee["IdAdmin"]);
			$gestionnaires[] = $gestionnaire;
		}

		return $gestionnaires;
	}

	function deleteGestionnaireFromId($id) {
		$sql = "DELETE FROM utilisateurs WHERE id = ? AND idRole = 2";
		$requete = $this->bdd->prepare($sql);

		if ($requete->execute(array($id))) {
			return true;
		} else {
			return false;
		}
	}
		
	function insertGestionnaire($gestionnaire) {
		$nom = $gestionnaire->nom;
		$prenom = $gestionnaire->prenom;
		$adresse = $gestionnaire->adresse;
		$codePostal = $gestionnaire->codePostal;
		$ville = $gestionnaire->ville;
		$pays = $gestionnaire->pays;
		$numeroTelephone = $gestionnaire->numeroTelephone;
		$mail = $gestionnaire->mail;
		$login = $gestionnaire->login;
		$motDePasse = $gestionnaire->motDePasse;
		$idRole = $gestionnaire->idRole;
		$idAdmin = $gestionnaire->idAdmin;

		$sql = "INSERT INTO utilisateurs (Nom, Prénom, Adresse, CodePostal, Ville, "
			   . "Pays, NumeroTelephone, Mail, Login, MotDePasse, IdRole, IdAdmin) VALUES "
			   . "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$requete = $this->bdd->prepare($sql);

		if ($requete->execute(array($nom, $prenom, $adresse, $codePostal, $ville, $pays, 
		                            $numeroTelephone, $mail, $login, $motDePasse, $idRole, $idAdmin))) {
			return true;
		} else {
			return false;
		}
	}

	function updateGestionnaire($gestionnaire) {
		$id = $gestionnaire->id;
		$nom = $gestionnaire->nom;
		$prenom = $gestionnaire->prenom;
		$adresse = $gestionnaire->adresse;
		$numeroTelephone = $gestionnaire->numeroTelephone;
		$mail = $gestionnaire->mail;
		$login = $gestionnaire->login;
		$motDePasse = $gestionnaire->motDePasse;
		$idRole = $gestionnaire->idRole;
		$idAdmin = $gestionnaire->idAdmin;

		$sql = "UPDATE utilisateurs SET Nom = ?, Prénom = ?, Adresse = ?, NumeroTelephone = ?, "
		       . "Mail = ?, Login = ?, MotDePasse = ? WHERE IdRole = ? AND IdAdmin = ? AND ID = ?";
		$requete = $this->bdd->prepare($sql);

		if ($requete->execute(array($nom, $prenom, $adresse, $numeroTelephone, $mail, $login, 
		                            $motDePasse, $idRole, $idAdmin, $id))) {
			return true;
		} else {
			return false;
		}
	}

}



?>