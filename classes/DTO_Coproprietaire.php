<?php 
require_once("DTO_Utilisateurs.php");
/**
 * Représente un enregistrement d'un copropriétaire dans la table Utilisateur, hérite de la classe DTO_Utilisateurs
 */
class Coproprietaire extends Utilisateurs
{
	protected int $idCopropriete;

	function __construct($ID,$Nom, $Prenom, $Ville, $Adresse, $CodePostal, $Pays, $NumeroTelephone, $Mail, $Login, $MotDePasse, $IDRole, $IDCopropriete)
	{
		parent::__construct($ID, $Nom, $Prenom, $Ville, $Adresse, $CodePostal, $Pays, $NumeroTelephone, $Mail, $Login, $MotDePasse,$IDRole);
		$this->idCopropriete = $IDCopropriete;
	}
	

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
}
?>