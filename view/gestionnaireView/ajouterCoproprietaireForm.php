<h1 class="titrePage">Créer un copropriétaire</h1>
<form method="POST" action="index.php?act=creerCoproprietaire">
	<!-- Formulaire inputs -->

	<div class="w-50 mx-auto formulaireGestionInput">
			<div class="form-group">
				<input type="text" name="identifiant" required class=" mx-auto form-control" placeholder="Identifiant">
			</div>
			<div class="form-group">
				<input type="password" name="motDePasse" required class="mx-auto form-control" placeholder="Mot de passe">
			</div>
			<div class="form-group">
				<input type="text" name="prenom" required class="mx-auto form-control" placeholder="Prénom">
			</div>
			<div class="form-group">
				<input type="text" name="nom" required class="mx-auto form-control" placeholder="Nom">
			</div>
			<div class="form-group">
				<input type="text" name="email" required class="mx-auto form-control" placeholder="Adresse e-mail">
			</div>
			<div class="form-group">
				<input type="text" name="telephone" required class="mx-auto form-control" placeholder="Numéro de téléphone">
			</div>
			<div class="form-group">
				<input type="text" name="adressePostale" required class="mx-auto form-control" placeholder="Adresse postale">
			</div>
			<div class="form-group">
				<input type="text" name="codePostal" required class="mx-auto form-control" placeholder="Code Postal">
			</div>
			<div class="form-group">
				<input type="text" name="ville" required class="mx-auto form-control" placeholder="Ville">
			</div>
			<div class="form-group">
				<input type="text" name="pays" required class="mx-auto form-control" placeholder="Pays">
			</div>
			
	</div>

<div class="btForm"><button type="submit" class="btn btn-warning">Ajouter</button></div>
</form>
<div>
<a class="nav-link" href="index.php?act=gestionCoproprietaire"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>