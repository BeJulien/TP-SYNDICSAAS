<?php
session_start();

if(isset($_GET['act']))
{
	if($_GET['act'] == 'connect'){

		if(isset($_POST['login']) && isset($_POST['password'])){
			$login = $_POST['login'];
			$mdp = $_POST['password'];

			require_once('classes/DAO_Admin.php');
			require_once('classes/DAO_Gestionnaire.php');			
			require_once('classes/DAO_Coproprietaire.php');

			$adminDAO = new DAOAdmin();
			$admin = $adminDAO->verifLogin($login,$mdp);

			$gestionnaireDAO = new DAOGestionnaire();
			$gestionnaire = $gestionnaireDAO->verifLogin($login,$mdp);		
			
			$coproprietaireDAO = new DAOCoproprietaire();
			$coproprietaire = $coproprietaireDAO->verifLogin($login,$mdp);

			if($admin || $gestionnaire || $coproprietaire){
				$_SESSION['connected'] = 'connected';
				if($admin){
					$_SESSION['role'] = 'admin';
					$_SESSION['idUtilisateur'] = $adminDAO->getIdFromLogin($login);
				}elseif($gestionnaire) {
					$_SESSION['role'] = 'gestionnaire';
					$_SESSION['idUtilisateur'] = $gestionnaireDAO->getIdFromLogin($login);
				}elseif($coproprietaire){
					$_SESSION['role'] = 'coproprietaire';
					$_SESSION['idUtilisateur'] = $coproprietaireDAO->getIdFromLogin($login);
				} // Sinon pas de connexion
			}
		}
	}
}

if(!isset($_SESSION['connected'])){
	include('view/pages/connexion.php');
}
else{
	if($_SESSION['connected'] == 'connected'){
		switch ($_SESSION['role']) {
			case 'admin':
				include('adminController.php');
				break;

			case 'gestionnaire':
				include('gestionnaireController.php');
				break;

			case 'coproprietaire':
				include('coproprietaireController.php');
				break;
		}
	}
}

?>