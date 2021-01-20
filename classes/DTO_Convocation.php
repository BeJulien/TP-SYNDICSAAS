<?php
/**
 * Représente un enregistrement de la table Convocation
 */
class Convocation 
{
	protected $id;
	protected $dateEnvoi;
	protected $idCopropriete;
	protected $dateAssemblee;
	protected $heureAssemblee;
	protected $lieuAssemblee;
	protected $ordreDuJour;
	
	public function __construct($ID, $DateEnvoi, $IDCopropriete, $DateAssemblee, $HeureAssemblee, $LieuAssemblee, $OrdreDuJour)
	{
		$this->id = $ID;
		$this->dateEnvoi = $DateEnvoi;
		$this->idCopropriete = $IDCopropriete;

		// Transformation de la date en format JJ/MM/AAAA pour l'affichage dans le pdf
		$this->dateAssemblee = date('d/m/Y', strtotime($DateAssemblee));

		// Transformation de l'heure en format heure:minute pour l'affichage dans le pdf
		$heure = explode(':', $HeureAssemblee);
		$this->heureAssemblee = ''.$heure[0].':'.$heure[1].'';

		$this->lieuAssemblee = $LieuAssemblee;

		// les ordres du jour sont séparés par des ; dans la BDD, on les sépare donc pour former un tableau d'ordres du jour.
		$ordres = explode(';', $OrdreDuJour);
		$this->ordreDuJour = $ordres;
	}

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
}

?>
