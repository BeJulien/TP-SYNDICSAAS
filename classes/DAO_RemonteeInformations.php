<?php
    require_once("DTO_RemonteeInformations.php");
    require_once("DAO_Class.php");

    /**
     * Classe permettant l'envoi de requêtes sur la BDD dans la table Coproriete
     * et qui renvoie un objet "RemonteeInformations" au code PHP
     */
    class DAORemonteeInformations extends DAO {
        function __construct()
        {
            parent::__construct();
        }

        // Récupération de toutes les informations remontées.
        function getAllRemonteeInformations() {
            $infos = array();

            $sql = "SELECT * FROM remonteeinformations";
            $requete = $this->bdd->prepare($sql);
            $requete->execute();

            while ($donnee = $requete->fetch(PDO::FETCH_ASSOC)) {
                if (!$donnee) {
                    return false;
                }

                $info = new RemonteeInformations($donnee['ID'], $donnee['Description'], $donnee['Photo'], 
                                                 $donnee['IncidentResolu'], $donnee['IdProprietaire']);
                $infos[] = $info;
            }

            return $infos;
        }

        // Insère une nouvelle information dans la base de données
        function insertRemonteeInformations($information) {
            $description = $information->description;
            $photo = $information->photo;
            $incidentResolu = $information->incidentResolu;
            $idProprietaire = $information->idProprietaire;

            $sql = "INSERT INTO remonteeinformations (Description, Photo, IncidentResolu, IdProprietaire)"
                   . " VALUES (?, ?, ?, ?)";
            $requete = $this->bdd->prepare($sql);

            if ($requete->execute(array($description, $photo, $incidentResolu, $idProprietaire))) {
                return true;
            } else {
                return false;
            }
        }
    }
?>