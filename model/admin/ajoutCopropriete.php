<?php
    include("../../classes/DAO_Copropriete.php");

    if (isset($_POST['nom']) && !empty($_POST['nom']) &&
        isset($_POST['ville']) && !empty($_POST['ville']) &&
        isset($_POST['adresse']) && !empty($_POST['adresse']) &&
        isset($_POST['cp']) && !empty($_POST['cp']) &&
        isset($_POST['surface']) && !empty($_POST['surface']) &&
        isset($_POST['idGestionnaire']) && !empty($_POST['idGestionnaire']) &&
        isset($_POST['typeEcheance']) && !empty($_POST['typeEcheance'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $ville = htmlspecialchars($_POST['ville']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $cp = htmlspecialchars($_POST['cp']);
            $surface = htmlspecialchars($_POST['surface']);
            $idGestionnaire = htmlspecialchars($_POST['idGestionnaire']);
            $typeEcheance = htmlspecialchars($_POST['typeEcheance']);

            $copropriete = new Copropriete("", $nom, $adresse, $cp, $ville, $surface, "", $idGestionnaire, $typeEcheance);
            $coproprieteDAO = new DAOCopropriete();

            $coproprieteDAO->insertCopropriete($copropriete);

            header("Location: ../../index.php?act=gestionCopropriete");
    }
?>