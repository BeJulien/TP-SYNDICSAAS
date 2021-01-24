<h1 class="titrePage">Modifier un copropriétaire</h1>
<?php echo $_GET['id']?>
<form method="POST" action="index.php?act=modifierBien&id=<?= $_GET['id']?>">
	<!-- Formulaire inputs -->

	<div class="w-50 mx-auto formulaireGestionInput">
			<div class="form-group">
				<input type="text" name="identifiant" value="<?= $identifiantForm ?>" class="mx-auto form-control" placeholder="Identifiant">
			</div>
			<div class="form-group">
				<input type="password" name="motDePasse" value="<?= $motDePasseForm ?>" class="mx-auto form-control" placeholder="Mot de passe">
			</div>
			<div class="form-group">
				<input type="text" name="prenom" value="<?= $prenomForm ?>" class="mx-auto form-control" placeholder="Prénom">
			</div>
			<div class="form-group">
				<input type="text" name="nom" value="<?= $nomForm ?>" class="mx-auto form-control" placeholder="Nom">
			</div>
			<div class="form-group">
				<input type="text" name="email" value="<?= $emailForm ?>" class="mx-auto form-control" placeholder="Adresse e-mail">
			</div>
			<div class="form-group">
				<input type="text" name="telephone" value="<?= $telForm ?>" class="mx-auto form-control" placeholder="Numéro de téléphone">
			</div>
			<div class="form-group">
				<input type="text" name="adressePostale" value="<?= $adresseForm ?>" class="mx-auto form-control" placeholder="Adresse postale">
			</div>
			<div class="form-group">
				<input type="text" name="codePostal" value="<?= $cpForm ?>" required class="mx-auto form-control" placeholder="Code Postal">
			</div>
			<div class="form-group">
				<input type="text" name="ville" value="<?= $villeForm ?>" required class="mx-auto form-control" placeholder="Ville">
			</div>
			<div class="form-group">
				<input type="text" name="pays" value="<?= $paysForm ?>" required class="mx-auto form-control" placeholder="Pays">
			</div>
			
	</div>

<div class="btForm"><button type="submit" class="btn btn-warning">Modifier</button></div>
</form>
<div>
<a class="nav-link" href="index.php?act=gestionCoproprietaire"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>