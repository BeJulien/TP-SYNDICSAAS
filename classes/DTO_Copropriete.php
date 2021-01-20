<?php

/**
 * Représente un enregistrement de la table Copropriété
 */
class Copropriete 
{
	protected int $id;
	protected string $nom;
	protected string $adresse;
	protected string $codePostal;
	protected string $ville;
	protected int $surfaceTotale;
	protected string $lienImage;
	protected int $idGestionnaire;
	protected int $idTypeEcheance;

	
	public function __construct($ID,$Nom, $Adresse, $CodePostal, $Ville, $SurfaceTotale,$LienImage,$IDGestionnaire,$IDTypeEcheance)
	{
		$this->id = $ID;
		$this->nom = $Nom;
		$this->adresse = $Adresse;
		$this->codePostal = $CodePostal;
		$this->ville = $Ville;
		$this->surfaceTotale = $SurfaceTotale;
		$this->lienImage = $LienImage;
		$this->idGestionnaire = $IDGestionnaire;
		$this->idTypeEcheance = $IDTypeEcheance;
	}

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
}

?>