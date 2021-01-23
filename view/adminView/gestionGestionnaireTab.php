	<h1 class="titrePage">Gestion des gestionnaires</h1>
	<table id="tableList">
		<tr>
			<th>Identifiant</th>
			<th>Prénom</th>
			<th>Nom</th>
		</tr>
		<?php
			include("classes/DAO_Gestionnaire.php");

			$gestionnaireDAO = new DAOGestionnaire();
		
			$gestionnaires = $gestionnaireDAO->getAllGestionnairesFromIdAdmin($_SESSION['idUtilisateur']);
			foreach ($gestionnaires as $num => $gestionnaire) {
				if ($num % 2 != 0) {
					echo "<tr id='testLigne'>";
				} else {
					echo "<tr>";
				}
				echo "<td>" . $gestionnaire->id . "</td>";
				echo "<td>" . $gestionnaire->prenom . "</td>";
				echo "<td>" . $gestionnaire->nom . "</td>";
				echo "<td class='modifG'>";
				echo "<i class='fas fa-cog fa-lg modifEngrenageGestionnaire' id='" . $gestionnaire->id . "'></i>";
				echo "<i class='fas fa-lg fa-times deleteCroix deleteCroixGestionnaire' id='" . $gestionnaire->id . "'></i>";
				echo "</td>";
				echo "</tr>";
			}
		?>
	</table>
	<div>
		<a class="nav-link" href="index.php?act=ajouterGestionnaireForm">
			<button type="submit" class="btn btnAdd">
				<i class="fas fa-plus"></i> Ajouter un gestionnaire
			</button>
		</a>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/adminScript.js"></script>