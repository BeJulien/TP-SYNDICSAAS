
	<h1 class="titrePage">Gestion des copropriétés</h1>
	<table id="tableList">
		<tr>
			<th>Nom</th>
			<th>Ville</th>
			<th>Adresse</th>
			<th>Gestionnaire</th>
		</tr>
		<?php
			include("classes/DAO_Copropriete.php");
			include("classes/DAO_Gestionnaire.php");

			$coproprieteDAO = new DAOCopropriete();
			$gestionnaireDAO = new DAOGestionnaire();

			$coproprietes = $coproprieteDAO->getAllCoproprietes();

			foreach ($coproprietes as $num => $copropriete) {
				$gestionnaire = $gestionnaireDAO->getById($copropriete->idGestionnaire);
				if ($num % 2 != 0) {
					echo "<tr id='testLigne'>";
				} else {
					echo "<tr>";
				}
				echo "<td>" . $copropriete->nom . "</td>";
				echo "<td>" . $copropriete->ville . "</td>";
				echo "<td>" . $copropriete->adresse . "</td>";
				echo "<td>" . $gestionnaire->prenom . " " . $gestionnaire->nom . "</td>";
				echo "<td class='modifG'>";
				echo "<i class='fas fa-cog fa-lg modifEngrenageCopropriete' id='" . $copropriete->id . "'></i>";
				echo "<i class='fas fa-lg fa-times deleteCroix deleteCroixCopropriete' id='" . $copropriete->id . "'></i>";
				echo "</td>";
				echo "</tr>";
			}
		?>
	</table>
	<a class="nav-link" href="index.php?act=ajouterCoproprieteForm">
		<button class="btn btnAdd">
			<i class="fas fa-plus"></i> Ajouter un copropriété
		</button>
	</a>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/adminScript.js"></script>
	
