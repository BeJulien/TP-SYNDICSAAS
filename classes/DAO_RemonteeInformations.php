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

        //Johan
        function getByCopropriete($idCopropriete){

            $sql = "SELECT r.ID, r.Description,r.IncidentResolu,u.nom,u.prénom FROM remonteeinformations r, utilisateurs u WHERE r.IdProprietaire = u.ID AND idcopropriete = ? ORDER BY IncidentResolu";
            $requete = $this->bdd->prepare($sql);
            $requete->execute(array($idCopropriete));

            $listeremontees = [];

            while ($donnee = $requete->fetch()) {
                if (!$donnee) {
                    return false;
                }
                $remontee = array("id" => $donnee['ID'],"description" => $donnee['Description'],
                            "incidentResolu" => $donnee['IncidentResolu'],"nom" => $donnee['nom'],
                            "prenom" => $donnee['prénom']);
                array_push($listeremontees, $remontee);
            }

            return $listeremontees;
        }

        function validerRemontee($id){
            $sql = "UPDATE remonteeinformations SET IncidentResolu = '1' WHERE ID = ? ";
            $requete = $this->bdd->prepare($sql);
            if ($requete->execute(array($id))) {
                return true;
            } else {
                return false;
            }
        }

    }
?>