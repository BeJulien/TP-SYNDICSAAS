<?php
/**
 * Représente un enregistrement de la table Budget
 */
class Biens 
{
	protected $id;
	protected $type;
	protected $description;
	protected $surface;
	protected $idProprietaire;
	protected $idLot;
	
	public function __construct($ID, $Type,$Description, $Surface, $IdProprietaire, $IdLot)
	{
		$this->id = $ID;
		$this->type = $Type;
		$this->description = $Description;
		$this->surface = $Surface;
		$this->idProprietaire = $IdProprietaire;
		$this->idLot = $IdLot;
	}

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
}

?>
