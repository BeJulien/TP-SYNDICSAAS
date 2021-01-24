<?php
require_once('FPDF/fpdf.php');
/**
 * Génère le PDF pour la convocation
 */

class PDF_Convocation extends FPDF
{
  // Récupération du logo de syndicsaas et l'image de la copropriété  
  protected string $logoImage;
  protected string $coproprieteImage;

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

// Ajout des images récupérées et du titre
function Header()
{
	$this->SetDrawColor(234, 158, 10);
	$this->SetTextColor(13 , 88, 127);
    // Logo
    $this->Image($this->logoImage,10,6,35);
    //$this->Image($this->coproprieteImage,165,6,40);

    // Police Arial gras 15
    $this->SetFont('Times','B',15);
    $this->Ln(20);
    $this->Ln(20);
    // Décalage à droite
    $this->Cell(45);

    // Titre
    $this->Cell(100,10,utf8_decode('Convocation Assemblée'),1,0,'C');
    // Saut de ligne
    $this->Ln(20);
}



}



?>