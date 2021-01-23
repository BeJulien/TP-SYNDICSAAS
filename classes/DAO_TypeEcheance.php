<?php
    require_once("DTO_TypeEcheance.php");
    require_once("DAO_Class.php");

    /**
     * Classe permettant l'envoi de requêtes sur la BDD dans la table Coproriete
     * et qui renvoie un objet "TypeEcheance" au code PHP
     */
    class DAOTypeEcheance extends DAO {
        function __construct()
        {
            parent::__construct();
        }

        // Récupération de tous les types d'échéances.
        function getAllTypeEcheance() {
            $types = array();

            $sql = "SELECT * FROM typeecheance";
            $requete = $this->bdd->prepare($sql);
            $requete->execute();

            while ($donnee = $requete->fetch(PDO::FETCH_ASSOC)) {
                if (!$donnee) {
                    return false;
                }

                $type = new TypeEcheance($donnee['ID'], $donnee['Libelle']);
                $types[] = $type;
            }

            return $types;
        }
    }

?>