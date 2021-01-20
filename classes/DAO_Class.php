<?php
	/**
	* Classe permettant la connextion à la BDD et l'envoi de requête par les DAO héritant de celle-ci
	*/
	
	abstract class DAO 

	{

		#attributs
		protected $bdd; //new PDO
		protected $hostBdd; //mysql:host=localhost
		protected $nameBdd;//dbname
		protected $nameUserBdd;//root
		protected $MDPUserBdd;//""


		#constructeur (unique)
		function __construct(){
			$this->hostBdd = "localhost";
			$this->nameBdd = "syndicsaasbdd3";
			$this->nameUserBdd = "root";
			$this->MDPUserBdd = "";

			try {

				$this->bdd = new PDO('mysql:host='.$this->hostBdd.';dbname='.$this->nameBdd.';charset=utf8', $this->nameUserBdd, $this->MDPUserBdd);



			} catch (Exception $e) {

				echo "Erreur de connexion à la base de données.";
				
			}
		}

		



	}

?>
