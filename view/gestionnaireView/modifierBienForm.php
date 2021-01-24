<h1 class="titrePage">Modifier un bien</h1>
<!-- METTRE VALEUR DE BASE DU BIEN -->
<form method="POST" action="index.php?act=modifierBien&id=<?= $_GET['id']?>">
<div class="mx-auto w-75">
	<div class="form-group">
		<!-- REMPLIR AVEC COPROPRIETAIRES -->
		<select type="text" name="proprietaire" class="form-control">
			<?php foreach($listeCoproprietaire as $unCoproprietaire){?>
				<option value="<?= $unCoproprietaire->id ?>" <?php if($modifBien->idProprietaire == $unCoproprietaire->id) echo "selected" ?> > <?= $unCoproprietaire->prenom.' '.$unCoproprietaire->nom ?></option>
			<?php }?>
		</select>
	</div>
	<div class="form-group">
		<!-- REMPLIR TYPE VIA BDD -->
		<input type="text" name="type" value="<?= $typeForm ?>" class="form-control">
	</div>
	<div class="form-group">
		<input type="text" name="description" value="<?= $descriptionForm ?>" class="form-control" placeholder="Description">
	</div>
	<div class="form-group">
		<input type="number" name="surface" value="<?= $surfaceForm ?>" class="form-control" placeholder="Surface (la somme de toutes les surfaces doit être inférieure à la surface totale de la copropriété)">
	</div>		
</div>
<div class="btForm"><button type="submit" class="btn btn-warning">Modifier</button></div>
</form>
<div>
<a class="nav-link" href="index.php?act=gestionBiens"><button type="submit" class="btn btn-danger d-block mx-auto">Annuler</button></a>
</div>

