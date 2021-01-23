<h1 class="titrePage">Modifier un gestionnaire</h1>
<form method="POST" action="model/admin/modifGestionnaire.php">
	<!-- Formulaire inputs -->
<div class="row mx-auto">
	<div class="col-md-6 col-sm-4 mx-auto formulaireGestionInput">
			<?php
				include("classes/DAO_Gestionnaire.php");

				$gestionnaireDAO = new DAOGestionnaire();
				$gestionnaire = $gestionnaireDAO->getById($_GET['modif']);
			?>
			<div class="form-group">
				<input type="text" name="id" class="form-control" value="<?php echo $_GET['modif'] ?>" hidden>
			</div>
			<div class="form-group">
				<input type="text" name="identifiant" class="form-control" placeholder="Identifiant" value="<?php echo $gestionnaire->login ?>" required>
			</div>
			<div class="form-group">
				<input type="password" name="motDePasse" class="form-control" placeholder="Mot de passe" value="<?php echo $gestionnaire->motDePasse ?>" required>
			</div>
			<div class="form-group">
				<input type="text" name="prenom" class="form-control" placeholder="Prénom" value="<?php echo $gestionnaire->prenom ?>" required>
			</div>
			<div class="form-group">
				<input type="text" name="nom" class="form-control" placeholder="Nom" value="<?php echo $gestionnaire->nom ?>" required>
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Adresse e-mail" value="<?php echo $gestionnaire->mail ?>" required>
			</div>
			<div class="form-group">
				<input type="tel" name="telephone" class="form-control" placeholder="Numéro de téléphone" value="<?php echo $gestionnaire->numeroTelephone ?>" required>
			</div>
			<div class="form-group">
				<input type="text" name="adressePostale" class="form-control" placeholder="Adresse postale" value="<?php echo $gestionnaire->adresse ?>" required>
			</div>
			
	</div>
</div>


<div class="btForm"><button type="submit" class="btn btn-warning">Modifier</button></div>
</form>
<div>
<a class="nav-link" href="index.php?act=gestionGestionnaire"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>