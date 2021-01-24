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

	function getByCopropriete($idCopropriete){
		$sql = "SELECT * FROM convocationsassemblees WHERE DateAssemblee >= NOW() AND IdCopropriete = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($idCopropriete));
		
		$listeConvocation = [];

		//$donnee = $requete->fetch();
		while($donnee = $requete->fetch()){
			if (!$donnee) {
                return false;
            }
			$convocation = new Convocation($donnee["ID"],$donnee["DateEnvoi"], $donnee["IdCopropriete"], $donnee["DateAssemblee"], $donnee["HeureAssemblee"], $donnee["LieuAssemblee"], $donnee["OrdresDuJour"]);
			array_push($listeConvocation, $convocation);
		}
		return $listeConvocation;

	}

	function creerConvocation($data){
		$sql= "INSERT INTO `convocationsassemblees`(`DateEnvoi`, `IdCopropriete`, `DateAssemblee`, `HeureAssemblee`, `LieuAssemblee`, `OrdresDuJour`) VALUES (?,?,?,?,?,?)";

		$dateEnvoi = date("Y-m-d");
		$idCopropriete = $data['copropriete'];
		$lieu = $data['lieu'];
		$ordres = $data['ordres'];
		$date = $data['date'];
		$heure = $data['heure'];

		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($dateEnvoi,$idCopropriete,$date,$heure,$lieu,$ordres));
	}

		
}



?>