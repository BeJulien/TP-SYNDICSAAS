<?php
    session_start();

    include("../../classes/DAO_Gestionnaire.php");

    if (isset($_POST['identifiant']) && !empty($_POST['identifiant']) &&
        isset($_POST['motDePasse']) && !empty($_POST['motDePasse']) &&
        isset($_POST['prenom']) && !empty($_POST['prenom']) &&
        isset($_POST['nom']) && !empty($_POST['nom']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['telephone']) && !empty($_POST['telephone']) &&
        isset($_POST['adressePostale']) && !empty($_POST['adressePostale'])) {
            $identifiant = htmlspecialchars($_POST['identifiant']);
            $motDePasse = htmlspecialchars($_POST['motDePasse']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $email = htmlspecialchars($_POST['email']);
            $telephone = htmlspecialchars($_POST['telephone']);
            $adressePostale = htmlspecialchars($_POST['adressePostale']);

            $gestionnaire = new Gestionnaire("", $nom, $prenom, $adressePostale, "", "", "", $telephone, $email, $identifiant, $motDePasse, 2, $_SESSION['idUtilisateur']);
            $gestionnaireDAO = new DAOGestionnaire();

            $gestionnaireDAO->insertGestionnaire($gestionnaire);

            header("Location: ../../index.php?act=gestionGestionnaire");
    }

?>