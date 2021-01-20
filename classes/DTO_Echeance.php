<?php
/**
 * Représente un enregistrement de la table echeancesaregler
 */
class Echeance 
{
	protected $id;
	protected $sommeARegler;
	protected $dateLimitePaiement;
	protected $idProprietaire;
	protected $idBudget;
	protected $idLot;
	protected $reglementEffectue;
	protected $dateReglement;
	
	public function __construct($ID, $SommeARegler,$DateLimitePaiement, $IDProprietaire, $IDBudget, $IDLot, $ReglementEffectue, $DateReglement)
	{
		$this->id = $ID;
		// ajout du caractère € pour l'affichage de la somme à régler dans le pdf
		$this->sommeARegler = $SommeARegler.chr(128).'';
		// la date obtenue dans mysql est transformée pour avoir le format JJ/MM/AAAA plutôt que AAAA-MM-JJ
		$this->dateLimitePaiement = date('d/m/Y', strtotime($DateLimitePaiement));
		$this->idProprietaire = $IDProprietaire;
		$this->idBudget = $IDBudget;
		$this->idLot = $IDLot;
		// Si le règlement effectué a pour valeur 1, alors l'affichage sera "oui", sinon "non"
		if ($ReglementEffectue == 1) {
			$this->reglementEffectue = "Oui";
		} 
		else {
			$this->reglementEffectue = "Non";
		}

		// Si la date de règlement est nulle, alors un tiret sera affiché
		if (is_null($DateReglement)) {
			$this->dateReglement = "-";	
		} else {
			$this->dateReglement = date('d/m/Y', strtotime($DateReglement));	
		}
		
	}

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
}

?>
