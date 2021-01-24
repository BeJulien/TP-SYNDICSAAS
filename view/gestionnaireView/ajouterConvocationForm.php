<h1 class="titrePage">Créer une convocation</h1>
<form method="POST" action="index.php?act=creerConvocation">
	<!-- Formulaire inputs -->

	<div class="w-50 mx-auto formulaireGestionInput">

			<div class="form-group">
				<input type="text" name="lieu" required class="mx-auto form-control" placeholder="Lieu">
			</div>
			<div class="form-group">
				<input type="text" name="ordres" required class="mx-auto form-control" placeholder="Ordres du jour (séparés par un ;)">
			</div>
			<div class="form-group">
				<input type="date" name="date" required class="mx-auto form-control" placeholder="Nom">
			</div>
			<div class="form-group">
				<input type="time" name="heure" required class="mx-auto form-control" placeholder="Pays">
			</div>
			
	</div>

<div class="btForm"><button type="submit" class="btn btn-warning">Ajouter</button></div>
</form>
<div>
<a class="nav-link" href="index.php?act=gestionConvocation"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>