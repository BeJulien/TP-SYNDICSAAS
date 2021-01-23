<h1 class="titrePage">Créer une copropriété</h1>
<form method="POST" action="model/admin/ajoutCopropriete.php">
	<!-- Formulaire inputs -->
<div class="row mx-auto">
	<div class="col-md-6 col-sm-4 mx-auto formulaireGestionInput">
			<div class="form-group">
				<input type="text" name="nom" class="form-control" placeholder="Nom" required>
			</div>
			<div class="form-group">
				<input type="text" name="ville" class="form-control" placeholder="Ville" required>
			</div>
			<div class="form-group">
				<input type="text" name="adresse" class="form-control" placeholder="Adresse Postal" required>
			</div>
			<div class="form-group">
				<input type="text" name="cp" class="form-control" placeholder="Code postal" required>
			</div>
			<div class="form-group">
				<input type="number" name="surface" class="form-control" placeholder="Surface totale habitable (m²)" required>
			</div>
			<div class="form-group">
				<select class="form-control" name="idGestionnaire" required>
					<?php 
						include("classes/DAO_Gestionnaire.php");

						$gestionnaireDAO = new DAOGestionnaire();
						$gestionnaires = $gestionnaireDAO->getAllGestionnairesFromIdAdmin($_SESSION["idUtilisateur"]);

						foreach ($gestionnaires as $gestionnaire) {
							echo "<option value='" . $gestionnaire->id . "'>";
							echo $gestionnaire->prenom . " " . $gestionnaire->nom . " (" . $gestionnaire->login . ")";
							echo"</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<select class="form-control" name="typeEcheance" required>
					<?php 
						include("classes/DAO_TypeEcheance.php");

						$typeEcheanceDAO = new DAOTypeEcheance();
						$types = $typeEcheanceDAO->getAllTypeEcheance();

						foreach ($types as $type) {
							echo "<option value='" . $type->id . "'>" . $type->libelle . "</option>";
						}
					?>
				</select>
			</div>
			
	</div>
</div>

<div class="btForm"><button type="submit" class="btn btn-warning">Ajouter</button></div>
</form>
<div>
<a class="nav-link" href="index.php?act=gestionCopropriete"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>