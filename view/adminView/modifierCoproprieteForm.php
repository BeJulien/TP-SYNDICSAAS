<h1 class="titrePage">Modifier une copropriété</h1>
<form method="POST">
	<!-- Formulaire inputs -->
<div class="row mx-auto">
	<div class="col-md-6 col-sm-4 mx-auto formulaireGestionInput">
			<div class="form-group">
				<input type="text" name="nom" class="form-control" placeholder="Nom">
			</div>
			<div class="form-group">
				<input type="password" name="ville" class="form-control" placeholder="Ville">
			</div>
			<div class="form-group">
				<input type="text" name="adresse" class="form-control" placeholder="Adresse Postal">
			</div>
			<div class="form-group">
				<input type="text" name="cp" class="form-control" placeholder="Code postal">
			</div>
			<div class="form-group">
				<input type="number" name="surface" class="form-control" placeholder="Surface totale habitable">
			</div>
			<div class="form-group">
				<select class="form-control">
					<option value="0">Type d'échéance</option>
					<!-- AJOUTER LES AUTRES VIA BDD -->
				</select>
			</div>
			<div class="form-group">
				<!-- CLIC SUR LABEL PEUT ETRE MODIFIER EN JS l'affichage-->
				<input type="file" id="files" name="photo" class="form-control" placeholder="Photo" hidden>
				<label for="files" class="form-control">Choisir un photo</label>
			</div>
			
	</div>
	<!-- Liste -->
	<div class="col-md-6 col-sm-4 mx-auto mx-auto">
		<div class="w-50 h-75 mt-5">
			<div class="bg-warning"> Liste des gestionnaires&nbsp;&nbsp;<i class="fas fa-lg fa-plus text-success"></i>&nbsp;&nbsp;<i class="fas fa-lg fa-minus text-secondary"></i></div>
			<!--Liste des gestionnaires à remplir -->
			<div class="bg-light border-secondary border h-75" id="ListeCopropriete">
				
			</div>
			<div></div>
		</div>
	</div>
</div>

<div class="btForm"><button type="submit" class="btn btn-warning">Modifier</button><button class="btn btn-danger" type="reset">Annuler</button></div>
</form>