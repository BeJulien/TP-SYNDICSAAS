<h1 class="titrePage">Créer un copropriétaire</h1>
<form method="POST">
	<!-- Formulaire inputs -->
<div class="row mx-auto">
	<div class="col-md-6 col-sm-4 mx-auto formulaireGestionInput">
			<div class="form-group">
				<input type="text" name="identifiant" class="form-control" placeholder="Identifiant">
			</div>
			<div class="form-group">
				<input type="password" name="motDePasse" class="form-control" placeholder="Mot de passe">
			</div>
			<div class="form-group">
				<input type="text" name="prenom" class="form-control" placeholder="Prénom">
			</div>
			<div class="form-group">
				<input type="text" name="nom" class="form-control" placeholder="Nom">
			</div>
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Adresse e-mail">
			</div>
			<div class="form-group">
				<input type="text" name="telephone" class="form-control" placeholder="Numéro de téléphone">
			</div>
			<div class="form-group">
				<input type="text" name="adressePostale" class="form-control" placeholder="Adresse postale">
			</div>
			
	</div>
	<!-- Liste -->
	<div class="col-md-6 col-sm-4 mx-auto mx-auto">
		<div class="w-50 h-75 mt-5">
			<div class="bg-warning"> Liste des biens dans la copropriété&nbsp;&nbsp;<i class="fas fa-lg fa-plus text-success"></i>&nbsp;&nbsp;<i class="fas fa-lg fa-minus text-secondary"></i></div>
			<!--Liste des copropriétés à remplir -->
			<div class="bg-light border-secondary border h-75" id="ListeCopropriete">
				
			</div>
			<div></div>
		</div>
	</div>
</div>

<div class="btForm"><button type="submit" class="btn btn-warning">Ajouter</button></div>
</form>
<div>
<a class="nav-link" href="index.php?act=accueil"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>