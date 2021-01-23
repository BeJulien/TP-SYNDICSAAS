<h1 class="titrePage">Modifier une copropriété</h1>
<form method="POST" action="model/admin/modifCopropriete.php">
	<!-- Formulaire inputs -->
<div class="row mx-auto">
	<div class="col-md-6 col-sm-4 mx-auto formulaireGestionInput">
			<?php
				include("classes/DAO_Copropriete.php");

				$coproprieteDAO = new DAOCopropriete();
				$copropriete = $coproprieteDAO->getById($_GET['modif']);
			?>
			<div class="form-group">
				<input type="text" name="id" class="form-control" value="<?php echo $_GET['modif'] ?>" hidden>
			</div>
			<div class="form-group">
				<input type="text" name="nom" class="form-control" placeholder="Nom" value="<?php echo $copropriete->nom ?>" required>
			</div>
			<div class="form-group">
				<input type="text" name="ville" class="form-control" placeholder="Ville" value="<?php echo $copropriete->ville ?>" required>
			</div>
			<div class="form-group">
				<input type="text" name="adresse" class="form-control" placeholder="Adresse Postal" value="<?php echo $copropriete->adresse ?>" required>
			</div>
			<div class="form-group">
				<input type="text" name="cp" class="form-control" placeholder="Code postal" value="<?php echo $copropriete->codePostal ?>" required>
			</div>
			<div class="form-group">
				<input type="number" name="surface" class="form-control" placeholder="Surface totale habitable (m²)" value="<?php echo $copropriete->surfaceTotale ?>" required>
			</div>
			<div class="form-group">
				<select class="form-control" name="idGestionnaire" required>
					<?php 
						include("classes/DAO_Gestionnaire.php");

						$gestionnaireDAO = new DAOGestionnaire();
						$gestionnaires = $gestionnaireDAO->getAllGestionnairesFromIdAdmin($_SESSION["idUtilisateur"]);

						foreach ($gestionnaires as $gestionnaire) {
							if ($gestionnaire->id == $copropriete->idGestionnaire) {
								echo "<option value='" . $gestionnaire->id . "' selected>";
								echo $gestionnaire->prenom . " " . $gestionnaire->nom . " (" . $gestionnaire->login . ")";
								echo"</option>";
							} else {
								echo "<option value='" . $gestionnaire->id . "'>";
								echo $gestionnaire->prenom . " " . $gestionnaire->nom . " (" . $gestionnaire->login . ")";
								echo"</option>";
							}
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
							if ($type->id == $copropriete->idTypeEcheance) {
								echo "<option value='" . $type->id . "' selected>" . $type->libelle . "</option>";
							} else {
								echo "<option value='" . $type->id . "'>" . $type->libelle . "</option>";
							}
						}
					?>
				</select>
			</div>			
	</div>
</div>

<div class="btForm">
	<button type="submit" class="btn btn-warning">Modifier</button>
</div>
</form>
<div>
<a class="nav-link" href="index.php?act=gestionCopropriete"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>