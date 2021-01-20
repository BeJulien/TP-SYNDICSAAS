<?php
/**
 * Représente un enregistrement de la table Lot
 */
class Lot 
{
	protected $id;
	protected $idCopropriete;

	
	public function __construct($ID, $IDCopropriete)
	{
		$this->id = $ID;
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
