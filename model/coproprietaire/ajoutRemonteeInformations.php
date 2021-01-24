<?php
    session_start();

    include("../../classes/DAO_RemonteeInformations.php");

    if (isset($_POST["description"]) && !empty($_POST["description"])) {
        $description = htmlspecialchars($_POST["description"]);
        
        $information = new RemonteeInformations("", $description, "", 0, $_SESSION["idUtilisateur"]);
        $remonteeInformationsDAO = new DAORemonteeInformations();

        $remonteeInformationsDAO->insertRemonteeInformations($information);

        header("Location: ../../index.php?act=accueil");
    }
?>