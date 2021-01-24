<?php

require_once("./PDF_Relance.php");
/**
 * Classe qui récupère les informations envoyées par le fichier AFFICHAGE_Relance
 * et qui les met en forme pour ensuite pouvoir générer le PDF de relance 
 */
	Class GenerationRelance

	{

		protected $copropriete;
		protected $coproprietaire;
		protected $gestionnaire;
		protected $allEcheance;

	public function __construct($Copropriete, $Coproprietaire, $Gestionnaire, $AllUnpaidEcheance)
	{
		$this->copropriete = $Copropriete;
		$this->coproprietaire = $Coproprietaire;
		$this->gestionnaire = $Gestionnaire;
		$this->allEcheance = $AllUnpaidEcheance;
	}

	// Met en forme le texte indiquant l'émetteur de la relance (la copropriété)
	public function genererTexteInfoCopropriete() 
	{
		$texteInfoCopropriete = "".$this->copropriete->nom."\n";
		$texteInfoCopropriete .="".$this->copropriete->adresse."\n".$this->copropriete->codePostal." ".$this->copropriete->ville."\n\n";
		$texteUtf = iconv('UTF-8', 'windows-1252', $texteInfoCopropriete);
		return $texteUtf;
	} 


	// Met en forme le texte indiquant le destinataire de la relance (le coproprietaire)
	public function genererTexteInfoCoproprietaire() {
		$texteInfoCoproprietaire ="".$this->coproprietaire->nom." ".$this->coproprietaire->prenom."\n";
		$texteInfoCoproprietaire .="".$this->coproprietaire->adresse."\n".$this->coproprietaire->codePostal." ".$this->coproprietaire->ville."\n\n";
		$texteUtf = iconv('UTF-8', 'windows-1252', $texteInfoCoproprietaire);
		return $texteUtf;
	}


	// Met en forme le corps de la relance, en y ajoutant des informations concernant l'échéance qui n'a pas été payée, son montant etc ... 
	public function genererTexteCorpsRelance($echeance) {

		$texteCorpsRelance ="Objet : Relance de paiement de cotisation.\n";
		$texteCorpsRelance .="P.J. : Echéance concernée.\n";
		$texteCorpsRelance .="A ".$this->gestionnaire->ville.", le ".date("d/m/Y")."\n\n";
		$texteCorpsRelance .="Madame, Monsieur,\n\n";
		$texteCorpsRelance .="Sauf erreur ou omission de ma part, le paiement de l'échéance n°".$echeance->id." pour un montant de ".substr_replace($echeance->sommeARegler, "€", -1).", et arrivée à échéance le ".$echeance->dateLimitePaiement.", ne m'est pas parvenu.\n\n";
		$texteCorpsRelance .= "Je vous prie de bien vouloir procéder à son règlement dans les meilleurs délais, et vous adresse, à toutes fins utiles, un duplicata de l'échéance en pièce jointe.\n\nSi par ailleurs votre paiement venait à me parvenir avant la réception de cette lettre, je vous saurais gré de ne pas tenir compte de cette dernière.\n\nVous remerciant de faire le nécessaire, et restant à votre entière disposition pour toute éventuelle question, je vous prie d'agréer, Madame, Monsieur, l'expression de mes salutations distinguées.\n\n";
		$texteCorpsRelance .="".$this->gestionnaire->nom." ".$this->gestionnaire->prenom."\n";
		$texteCorpsRelance .="Gestionnaire de la copropriété ".$this->copropriete->nom." ";

		$texteCorpsRelanceUtf = iconv('UTF-8', 'windows-1252', $texteCorpsRelance);
		return $texteCorpsRelanceUtf; 

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
	public function recoverData($Echeance) {
		$dataTableau = array();
		$echeance = array($Echeance->id,
									  $Echeance->sommeARegler,
									  $Echeance->dateLimitePaiement,
									  $Echeance->reglementEffectue,
									  $Echeance->dateReglement);
			array_push($dataTableau, $echeance);
		
		return $dataTableau;
	}

	public function genererPDFRelance() {
		$pdf = new PDF_Relance();
		$pdf->logoImage = "../img/syndicsaas.png";
		$pdf->copropriete = $this->copropriete;
		foreach ($this->allEcheance as $value) {
			$pdf->AddPage();
			$pdf->SetFont('Times','',12);

			$pdf->MultiCell(0,5,$this->genererTexteInfoCopropriete(),0, "L");
			$pdf->MultiCell(0,5,$this->genererTexteInfoCoproprietaire(),0, "R");
			$pdf->MultiCell(0,5,$this->genererTexteCorpsRelance($value),0, "J");

			$pdf->AddPage();
			$header = $this->createHeader();
			$data = $this->recoverData($value);
		// Chargement des données
			$pdf->SetFont('Times','',14);

			$pdf->FancyTable($header,$data);
		}
		


		$pdf->Output();
	}



	}


?>