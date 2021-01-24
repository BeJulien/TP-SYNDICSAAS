<?php
require_once('FPDF/fpdf.php');



class PDF_ECHEANCIER extends FPDF
{

    protected string $logoImage;
    protected $copropriete;
    protected $coproprietaire;
    protected $budget;

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    
// En-tête
function Header()
{
	$this->SetDrawColor(234, 158, 10);
	$this->SetTextColor(13 , 88, 127);
    // Logos
    $this->Image($this->logoImage,10,6,35);
    $this->Image($this->copropriete->lienImage,165,6,40);


    // Police Arial gras 15
    $this->SetFont('Times','B',15);
    $this->Ln(20);
    $this->Ln(20);

    // Décalage à droite
    $this->Cell(45);

    // Titre
    $this->Cell(100,10,utf8_decode('Echéancier des cotisations budget '.$this->budget->annee.''),1,0,'C');
    // Saut de ligne
    $this->Ln(20);

    $this->Cell(100,10,utf8_decode('Destinataire : '.$this->coproprietaire->prenom.' '.strtoupper($this->coproprietaire->nom).''),0,0,'L');

    $this->Ln(10);

    $this->MultiCell(0,5,utf8_decode('Copropriete : '.$this->copropriete->nom.' '.$this->copropriete->adresse."\n".$this->copropriete->codePostal." ".$this->copropriete->ville."\n\n"),0,'L');
        

}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Times','I',8);
    // Numéro de page
}

function FancyTable($header, $data)
{
    // Couleurs, épaisseur du trait et police grasse
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // En-tête
    $w = array(10,40,60,45,38);
    for($i=0;$i<count($header);$i++)
    {
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    }

    $this->Ln();
    // Restauration des couleurs et de la police
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Données


    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],7,$row[0],'LR',0,'L',$fill);        
        $this->Cell($w[1],7,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],7,$row[2],'LR',0,'L',$fill);
        $this->Cell($w[3],7,$row[3],'LR',0,'L',$fill);
        $this->Cell($w[4],7,$row[4],'LR',0,'L',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Trait de terminaison
    $this->Cell(array_sum($w),0,'','T');
}

}



?>