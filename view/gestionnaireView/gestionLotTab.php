
	<h1 class="titrePage">Gestion des biens</h1>
	<table id="tableList">
		<tr>
			<th>Propriétaire</th>
			<th>Type</th>
			<th>Description</th>
			<th>Surface</th>
			<th></th>
		</tr>
		<?php foreach ($listeBiens as $unBien) {
			$proprietaire = new DAOCoproprietaire();
			$nom = ($proprietaire->getbyId($unBien->idProprietaire))->nom; ?>
		<tr>
			<td><?= htmlspecialchars($nom) ?></td>
			<td><?= htmlspecialchars($unBien->type)?></td>
			<td><?= htmlspecialchars($unBien->description)?></td>
			<td><?= htmlspecialchars($unBien->surface)?>m²</td>
			<td class="modifG"><i value="<?= $unBien->id ?>" class="modifierBienLine fas fa-cog fa-lg"></i><i value="<?= $unBien->id ?>" class="supprimerBienCross fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
		<?php } ?>
	</table>

<a class="nav-link" href="index.php?act=ajouterBienForm"><button type="submit" class="btn btnAdd"><i class="fas fa-plus"></i> Ajouter un bien</button></a>
