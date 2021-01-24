<?php
    /**
     * Représente un enregistrement de la table RemonteeInformations
     */
    class RemonteeInformations {
        protected $id;
        protected $description;
        protected $photo;
        protected $incidentResolu;
        protected $idProprietaire;

        public function __construct($ID, $Description, $Photo, $IncidentResolu, $IdProprietaire) {
            $this->id = $ID;
            $this->description = $Description;
            $this->photo = $Photo;
            $this->incidentResolu = $IncidentResolu;
            $this->idProprietaire = $IdProprietaire;
        }

        public function __get($name) {
            return $this->$name;
        }
    
        public function __set($name, $value) {
            $this->$name = $value;
        }
    }
?>