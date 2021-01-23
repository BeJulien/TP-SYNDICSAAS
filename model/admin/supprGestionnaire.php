<?php 
    include("../../classes/DAO_Gestionnaire.php");

    if (isset($_POST['suppr'])) {
        $gestionnaireDAO = new DAOGestionnaire();
        $gestionnaireDAO->deleteGestionnaireFromId($_POST['suppr']);
    }
?>