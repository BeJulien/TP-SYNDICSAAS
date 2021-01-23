<h1 class="titrePage">Créer un gestionnaire</h1>

<form method="POST" action="model/admin/ajoutGestionnaire.php">
	<!-- Formulaire inputs -->
<div class="row mx-auto">
	<div class="col-md-6 col-sm-4 mx-auto formulaireGestionInput">
			<div class="form-group">
				<input type="text" name="identifiant" class="form-control" placeholder="Identifiant" required>
			</div>
			<div class="form-group">
				<input type="password" name="motDePasse" class="form-control" placeholder="Mot de passe" required>
			</div>
			<div class="form-group">
				<input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
			</div>
			<div class="form-group">
				<input type="text" name="nom" class="form-control" placeholder="Nom" required>
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Adresse e-mail" required>
			</div>
			<div class="form-group">
				<input type="tel" name="telephone" class="form-control" placeholder="Numéro de téléphone" required>
			</div>
			<div class="form-group">
				<input type="text" name="adressePostale" class="form-control" placeholder="Adresse postale" required>
			</div>
		
	</div>
</div>

<div class="btForm"><button type="submit" class="btn btn-warning">Ajouter</button></div>
</form>
<div>
<a class="nav-link" href="index.php?act=gestionGestionnaire"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>