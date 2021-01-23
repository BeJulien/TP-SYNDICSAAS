<?php 
    include("../../classes/DAO_Copropriete.php");

    if (isset($_POST['suppr'])) {
        $coproprieteDAO = new DAOCopropriete();
        $coproprieteDAO->deleteCoproprieteFromId($_POST['suppr']);
    }
?>