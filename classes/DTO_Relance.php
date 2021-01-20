<?php
/**
 * Classe permettant la génération des relance
 */
class Relance 
{
	protected $id;
	protected $dateEnvoi;
	protected $idEcheance;
	
	public function __construct($ID, $DateEnvoi, $IDEcheance)
	{
		$this->id = $ID;
		// Transformation de la date en format JJ/MM/AAAA
		$this->dateEnvoi = date('d/m/Y', strtotime($DateEnvoi));
		$this->idEcheance = $IDEcheance;
	}

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}

}