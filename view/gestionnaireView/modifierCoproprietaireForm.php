<h1 class="titrePage">Modifier un copropriétaire</h1>
<?php echo $_GET['id']?>
<form method="POST" action="index.php?act=modifierBien&id=<?= $_GET['id']?>">
	<!-- Formulaire inputs -->
<div class="row mx-auto">
	<div class="col-md-6 col-sm-4 mx-auto formulaireGestionInput">
			<div class="form-group">
				<input type="text" name="identifiant" value="<?= $identifiantForm ?>" class="form-control" placeholder="Identifiant">
			</div>
			<div class="form-group">
				<input type="password" name="motDePasse" value="<?= $motDePasseForm ?>" class="form-control" placeholder="Mot de passe">
			</div>
			<div class="form-group">
				<input type="text" name="prenom" value="<?= $prenomForm ?>" class="form-control" placeholder="Prénom">
			</div>
			<div class="form-group">
				<input type="text" name="nom" value="<?= $nomForm ?>" class="form-control" placeholder="Nom">
			</div>
			<div class="form-group">
				<input type="text" name="email" value="<?= $emailForm ?>" class="form-control" placeholder="Adresse e-mail">
			</div>
			<div class="form-group">
				<input type="text" name="telephone" value="<?= $telForm ?>" class="form-control" placeholder="Numéro de téléphone">
			</div>
			<div class="form-group">
				<input type="text" name="adressePostale" value="<?= $adresseForm ?>" class="form-control" placeholder="Adresse postale">
			</div>
			<div class="form-group">
				<input type="text" name="codePostal" value="<?= $cpForm ?>" required class="form-control" placeholder="Code Postal">
			</div>
			<div class="form-group">
				<input type="text" name="ville" value="<?= $villeForm ?>" required class="form-control" placeholder="Ville">
			</div>
			<div class="form-group">
				<input type="text" name="pays" value="<?= $paysForm ?>" required class="form-control" placeholder="Pays">
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

<div class="btForm"><button type="submit" class="btn btn-warning">Modifier</button></div>
</form>
<div>
<a class="nav-link" href="index.php?act=accueil"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>