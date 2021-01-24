<?php
session_start();
// Classes permettant la récupération des données dans la base de données
require_once("../Classes/DAO_Convocation.php");
require_once("../Classes/DAO_Copropriete.php");
require_once("../Classes/DAO_Coproprietaire.php");
require_once("../Classes/DAO_Gestionnaire.php");
require_once("./GENERATION_Convocation.php");


// Ces objets permettent l'envoi de requêtes vers la BDD
$coproprieteDAO = new DAOCopropriete();
$gestionnaireDAO = new DAOGestionnaire();
$coproprietaireDAO = new DAOCoproprietaire();
$convocationDAO = new DAOConvocation();

// Récupération des informations de la convocation 1 (date assemblée, heure assemblée, ordres du jour etc)
$convocation = $convocationDAO->getById($_GET['idConvocation']);

// Récupération des informations du gestionnaire qui envoie la convocation (nom, prénom etc)
$gestionnaire = $gestionnaireDAO->getById($_SESSION['idUtilisateur']);

// Récupération des informations de la copropriété concernée par la convocation (nom, adresse etc)
$copropriete = $coproprieteDAO->getById($_SESSION['idCopropriete']);

// Récupération des informations du copropriétaire qui reçoit la convocation (nom, prénom, adresse etc)
$coproprietaire = $coproprietaireDAO->getById(6);

// Création de l'objet permettant la génération du pdf, puis envoi des informations que l'on souhaite voir apparaître dans la convocation
$pdfConvocation = new GenerationConvocation($copropriete,$gestionnaire,$coproprietaire,$convocation);

// Génération du pdf
$pdfConvocation->genererPDFConvocation();


?>