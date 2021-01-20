<?php 

/**
 * Classe abstraite représentant les champs communs entre les administrateurs, les gestionnaires et les coproprietaires
 * Les classes DTO_Gestionnaire et DTO_Coproprietaire héritent donc de cette classe (classe DTO_Administrateur non créée pour le moment)
 */
abstract class Utilisateurs
{
	protected string $id;
	protected string $nom;
	protected string $prenom;
	protected string $ville;
	protected string $adresse;
	protected string $codePostal;
	protected string $pays;
	protected string $numeroTelephone;
	protected string $mail;
	protected string $login;
	protected string $motDePasse;
	protected int $idRole;

	
	public function __construct($ID, $Nom, $Prenom, $Adresse, $CodePostal, $Ville, $Pays, $NumeroTelephone, $Mail, $Login, $MotDePasse, $IDRole)
	{
		$this->id = $ID;
		$this->nom = $Nom;
		$this->prenom = $Prenom;
		$this->ville = $Ville;
		$this->adresse = $Adresse;
		$this->codePostal = $CodePostal;
		$this->pays = $Pays;
		$this->numeroTelephone = $NumeroTelephone;
		$this->mail = $Mail;
		$this->login = $Login;
		$this->motDePasse = $MotDePasse;
		$this->idRole = $IDRole;
	}

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
}
?>