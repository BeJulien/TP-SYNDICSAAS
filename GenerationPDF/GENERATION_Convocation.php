<?php
require_once("./PDF_Convocation.php");
/**
 * Classe qui récupère les informations envoyées par le fichier AFFICHAGE_Convocation
 * et qui les met en forme pour ensuite pouvoir générer le PDF de convocation 
 */
	Class GenerationConvocation 

	{

		protected $copropriete;
		protected $gestionnaire;
		protected $coproprietaire;
		protected $convocation;

		public function __construct($Copropriete, $Gestionnaire, $Coproprietaire, $Convocation)
	{
		$this->copropriete = $Copropriete;
		$this->coproprietaire = $Coproprietaire;
		$this->gestionnaire = $Gestionnaire;
		$this->convocation = $Convocation;
	} 

	// Met en forme le texte indiquant l'émetteur de la convocation (la copropriété)
	public function genererTexteInfoCopropriete() {
		$texteInfoCopropriete = "".$this->copropriete->nom."\n";
		$texteInfoCopropriete .="".$this->copropriete->adresse."\n".$this->copropriete->codePostal." ".$this->copropriete->ville."\n\n";
		$texteUtf = iconv('UTF-8', 'windows-1252', $texteInfoCopropriete);
		return $texteUtf;
	}

	// Met en forme le texte indiquant le destinataire de la convocation (le coproprietaire)
	public function genererTexteInfoCoproprietaire() {
		$texteInfoCoproprietaire ="".$this->coproprietaire->nom." ".$this->coproprietaire->prenom."\n";
		$texteInfoCoproprietaire .="".$this->coproprietaire->adresse."\n".$this->coproprietaire->codePostal." ".$this->coproprietaire->ville."\n\n";
		$texteUtf = iconv('UTF-8', 'windows-1252', $texteInfoCoproprietaire);
		return $texteUtf;
	}

	// Met en forme le corps de la convocation en y ajoutant les informations concernant l'heure, la date de l'assemblée, 
	// les ordres du jour, le lieu où elle se déroulera etc ... 
	public function genererTexteCorpsConvocation() {	
		$texteCorpsConvocation ="A ".$this->gestionnaire->ville.", le ".date("d/m/Y")."\n\n";
		$texteCorpsConvocation .="Madame, Monsieur, \n\nJ’ai l’honneur de vous informer que je convoque ce jour l’assemblée générale des copropriétaires de l’immeuble sis à ".$this->copropriete->ville.", situé : ".$this->copropriete->adresse."";
		$texteCorpsConvocation .= ", qui se tiendra le ".$this->convocation->dateAssemblee.", à ".$this->convocation->heureAssemblee.", à ".$this->convocation->lieuAssemblee." . Cette assemblée sera appelée à délibérer sur le(s) ordre(s) du jour suivant(s) : \n\n";
		foreach ($this->convocation->ordreDuJour as $ordre) {
			$texteCorpsConvocation .="\t\t\t\t\t\t- ".$ordre."\n";
		}
		$texteCorpsConvocation .="\nSi vous souhaitez que d’autres questions soient portées à l’ordre du jour, vous devez les faire connaître par lettre recommandée avec accusé de réception dans le délai de six jours à compter de la réception de la présente convocation, conformément aux dispositions de l’article 10 du décret n° 67-223 du 17 mars 1967.\n\n";
		$texteCorpsConvocation .="Dans le cas où vous ne pourriez assister personnellement à la réunion du ".$this->convocation->dateAssemblee." , nous vous rappelons que vous avez la faculté de vous faire représenter par un mandataire de votre choix muni d'une procuration à remettre, complétée et signée par le représentant, au secrétaire de séance de l’assemblée générale.\n\n";
		$texteCorpsConvocation .="Je vous prie d’agréer, Madame, Monsieur, l’expression de mes sentiments distingués.\n\n\n";
		$texteCorpsConvocation .="".$this->gestionnaire->nom." ".$this->gestionnaire->prenom."\nGestionnaire de la copropriété ".$this->copropriete->nom."\n\n"; 



		$texteCorpsConvocationUtf = iconv('UTF-8', 'windows-1252', $texteCorpsConvocation);
		return $texteCorpsConvocationUtf; 
	}

	// Utilise la classe PDF_Convocation pour lancer la génération de la convocation
	public function genererPDFConvocation() {

		$pdf = new PDF_Convocation();
		$pdf->logoImage = "../img/syndicsaas.png";
		$pdf->coproprieteImage = $this->copropriete->lienImage;
		$pdf->SetFont('Times','',12);
		$pdf->AddPage();
		$pdf->MultiCell(0,5,$this->genererTexteInfoCopropriete(),0, "L");
		$pdf->MultiCell(0,5,$this->genererTexteInfoCoproprietaire(),0, "R");
		$pdf->MultiCell(0,5,$this->genererTexteCorpsConvocation(),0, "J");
		return $pdf->Output();
	}
}

?>