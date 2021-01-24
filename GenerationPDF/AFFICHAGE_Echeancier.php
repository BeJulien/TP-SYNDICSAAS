<?php
// Classes permettant la récupération des données dans la base de données
require_once("../Classes/DAO_Echeance.php");
require_once("../Classes/DAO_Copropriete.php");
require_once("../Classes/DAO_Coproprietaire.php");
require_once("../Classes/DAO_Budget.php");
require_once("../Classes/DAO_Lot.php");
require_once("./GENERATION_Echeancier.php");


// Ces objets permettent l'envoi de requêtes vers la BDD
$echeancesDAO = new DAOEcheance();
$coproprieteDAO = new DAOCopropriete();
$coproprietaireDAO = new DAOCoproprietaire();
$budgetDAO = new DAOBudget();
$lotDAO = new DAOLot();

// Récupération des informations du copropriétaire qui reçoit l'échéance (nom, prénom, adresse etc)
$coproprietaire = $coproprietaireDAO->getById(6);

// Récupération des échéances concernant le copropriétaire récupéré juste avant
// et stockage de ces échéances dans un tableau
$tabEcheances = $echeancesDAO->getAllEcheanceByCoproprietaireId($coproprietaire->id);

// Récupération du budget qui concerne les échéances récupérées juste avant
$budget = $budgetDAO->getById($tabEcheances[0]->idBudget);

// Récupération du lot qui concerne les échéances récupérées juste avant
$lot = $lotDAO->getById($tabEcheances[0]->idLot);

// Récupération de la copropriété où se trouve le lot
$copropriete = $coproprieteDAO->getById($lot->idCopropriete);

// Création de l'objet permettant la génération du pdf, puis envoi des informations que l'on souhaite voir apparaître dans l'échéancier
$pdfEcheancier = new GenerationEcheancier($tabEcheances,$coproprietaire,$copropriete,$budget);

// Génération du pdf
$pdfEcheancier->genererPDFEcheancier();






?>