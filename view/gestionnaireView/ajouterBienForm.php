<h1 class="titrePage">Ajouter un bien</h1>
<form method="POST" action="index.php?act=creerBien">
<div class="mx-auto w-75">
	<div class="form-group">
		<!-- REMPLIR AVEC COPROPRIETAIRES -->
		<select type="text" name="proprietaire" class="form-control">
			<?php foreach($listeCoproprietaire as $unCoproprietaire){?>
				<option value="<?= $unCoproprietaire->id ?>"><?= $unCoproprietaire->prenom.' '.$unCoproprietaire->nom ?></option>
			<?php }?>
		</select>
	</div>
	<div class="form-group">
		<input type="text" name="type" class="form-control" placeholder="Type (Studio, T2, T3, T4)">
	</div>
	<div class="form-group">
		<input type="text" name="description" class="form-control" placeholder="Description">
	</div>
	<div class="form-group">
		<input type="number" name="surface" class="form-control" placeholder="Surface (la somme de toutes les surfaces doit être inférieure à la surface totale de la copropriété)">
	</div>		
</div>
<div class="btForm"><button type="submit" class="btn btn-warning">Ajouter</button></div>
</form>
<div>
<a class="nav-link" href="index.php?act=accueil"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>