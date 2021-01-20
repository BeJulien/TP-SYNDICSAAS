<?php 
require_once("DTO_Utilisateurs.php");
/**
 * Représente un enregistrement d'un administrateur dans la table Utilisateur, hérite de la classe DTO_Utilisateurs
 */
class Admin extends Utilisateurs
{
	function __construct($ID,$Nom, $Prenom, $Adresse, $CodePostal, $Ville, $Pays, $NumeroTelephone, $Mail, $Login, $MotDePasse, $IDRole)
	{
		parent::__construct($ID, $Nom, $Prenom, $Adresse, $CodePostal, $Ville, $Pays, $NumeroTelephone, $Mail, $Login, $MotDePasse,$IDRole);
	}
	

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
}
?>