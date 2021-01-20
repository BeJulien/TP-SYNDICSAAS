<?php 
require_once("DTO_Utilisateurs.php");
/**
 * Représente un enregistrement d'un gestionnaire dans la table Utilisateur, hérite de la classe DTO_Utilisateurs
 */
class Gestionnaire extends Utilisateurs
{
	protected int $idAdmin;

	function __construct($ID,$Nom, $Prenom, $Adresse, $CodePostal, $Ville, $Pays, $NumeroTelephone, $Mail, $Login, $MotDePasse, $IDRole, $IDAdmin)
	{
		parent::__construct($ID, $Nom, $Prenom, $Adresse, $CodePostal, $Ville, $Pays, $NumeroTelephone, $Mail, $Login, $MotDePasse,$IDRole);
		$this->idAdmin = $IDAdmin;
	}
	

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
}
?>