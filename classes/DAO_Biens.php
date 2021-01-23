<?php

require_once("DTO_Biens.php");
require_once("DAO_Class.php");

/**
 * Classe permettant l'envoi de requêtes sur la BDD dans la table budget
 * et qui renvoie un objet "Budget" au code PHP
 */
class DAOBiens extends DAO
{
	
	function __construct()
	{
		parent::__construct();
	}


	// Récupération d'un budget selon son ID
	function getById($ID) 
	{

		$sql = "SELECT * FROM biens WHERE id = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));
		
		$donnee = $requete->fetch();
		if ($donnee == false){
			return false;

		} else {
			$bien = new Biens($donnee["ID"],$donnee["Type"],$donnee["Description"], $donnee["SurfaceEnM2"],
			$donnee["IdProprietaire"],$donnee["IdLot"]);
			return $bien;
		}
	}

	function getByCoproprieteID($ID){
		$sql = "SELECT b.ID,Type,Description,SurfaceEnM2,IdProprietaire,IdLot FROM biens b,lots l WHERE l.id = b.idLot AND IdCopropriete = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($ID));

		$listeBiens = [];

		//$donnee = $requete->fetch();
		while($donnee = $requete->fetch()){
			if (!$donnee) {
                return false;
            }
			$bien = new Biens($donnee["ID"],$donnee["Type"],$donnee["Description"], $donnee["SurfaceEnM2"],
			$donnee["IdProprietaire"],$donnee["IdLot"]);
			array_push($listeBiens, $bien);
		}

		return $listeBiens;
	}

	function createBien($data){

		$sql = "INSERT INTO `biens`(`Type`, `Description`, `SurfaceEnM2`, `IdProprietaire`, `idLot`)

		VALUES (?,?,?,?,?)";
		$requete = $this->bdd->prepare($sql);
		if ($requete->execute(array($data['type'], $data['description'], $data['surface'], $data['proprietaire'],
									$data['lot']))) {
            return true;
        } else {
        	echo "testt";
            return false;
        }
	}

	function modifierBien($data){
		echo $data['proprietaire'];
		$sql =  "UPDATE biens 
				SET Type = ?, Description = ?, SurfaceEnM2 = ?, IdProprietaire = ?
				WHERE ID = ? ";
		$requete = $this->bdd->prepare($sql);
		if ($requete->execute(array($data['type'], $data['description'], $data['surface'], $data['proprietaire'], 
									$data['idBien']))) {
            return true;
        } else {
            return false;
        }
	}


	function deleteBien($id){
		$sql = "DELETE FROM biens WHERE ID = ?";
		$requete = $this->bdd->prepare($sql);
		$requete->execute(array($id));
	}
		

		
}



?>