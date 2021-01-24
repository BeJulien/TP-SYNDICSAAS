<?php
require_once("./PDF_Echeancier.php");
/**
 * Classe qui récupère les informations envoyées par le fichier AFFICHAGE_Echeancier
 * et qui les met en forme pour ensuite pouvoir générer le PDF de l'échéancier 
 */

Class GenerationEcheancier {

	protected $echeances;
	protected $coproprietaire;
	protected $copropriete;
	protected $budget;

	public function __construct($Echeances,$Coproprietaire, $Copropriete, $Budget)
	{	
		$this->echeances = $Echeances;
		$this->coproprietaire = $Coproprietaire;
		$this->copropriete = $Copropriete;
		$this->budget = $Budget;
	}

// Permet la création de l'entête du tableau de l'échéancier
	public function createHeader() {
		$enteteTableau = array();
		$enteteTableau[] = iconv('UTF-8', 'windows-1252', "N°");
		$enteteTableau[] = iconv('UTF-8', 'windows-1252', 'Somme à régler');
		$enteteTableau[] = iconv('UTF-8', 'windows-1252', 'Date Limite de paiement');
		$enteteTableau[] = iconv('UTF-8', 'windows-1252',  'Réglement effectué');
		$enteteTableau[] = iconv('UTF-8', 'windows-1252', 'Date Réglement');
		return $enteteTableau;
	}

// Permet de récupérer les données contenues dans le tableau d'échéances
	public function recoverData() {
		$dataTableau = array();
		for ($i=0; $i <count($this->echeances); $i++) { 
			$nouvelleEcheance = array($this->echeances[$i]->id,
									  $this->echeances[$i]->sommeARegler,
									  $this->echeances[$i]->dateLimitePaiement,
									  $this->echeances[$i]->reglementEffectue,
									  $this->echeances[$i]->dateReglement);
			array_push($dataTableau, $nouvelleEcheance);
		}
		return $dataTableau;
	}

// Permet de générer le PDF qui affichera les échéances
		public function genererPDFEcheancier() {
			$pdf = new PDF_ECHEANCIER();
			$pdf->logoImage = "..\syndicsaas_logo.png";
			$pdf->copropriete = $this->copropriete;
			$pdf->coproprietaire = $this->coproprietaire;
			$pdf->budget = $this->budget;
			$header = $this->createHeader();
			$data = $this->recoverData();
			$pdf->SetFont('Times','',14);
			$pdf->AddPage();
			$pdf->FancyTable($header,$data);
			$pdf->Output();

		}



}

?>