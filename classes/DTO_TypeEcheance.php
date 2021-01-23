<?php
    /**
     * Représente un enregistrement de la table TypeEcheance
     */
    class TypeEcheance {
        protected $id;
        protected $libelle;

        public function __construct($ID, $Libelle) {
            $this->id = $ID;
            $this->libelle = $Libelle;
        }

        public function __get($name) {
            return $this->$name;
        }
    
        public function __set($name, $value) {
            $this->$name = $value;
        }
    }

?>