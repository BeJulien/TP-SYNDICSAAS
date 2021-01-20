<?php
/**
 * Représente un enregistrement de la table Budget
 */
class Budget 
{
	protected $id;
	protected $somme;
	protected $annee;
	protected $idCopropriete;
	
	public function __construct($ID, $Somme,$Annee, $IDCopropriete)
	{
		$this->id = $ID;
		$this->somme = $Somme;
		$this->annee = $Annee;
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
