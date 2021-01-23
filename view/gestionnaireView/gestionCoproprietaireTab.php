<h1 class="titrePage">Gestion des copropriétaires</h1>
	<table id="tableList">
		<tr>
			<th>Identifiant</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Millièmes</th>
		</tr>
		<!--foreach Copropriétés répéter <tr>
			Changer background-color à chaque ligne -->
		<?php
		foreach($listeCoproprietaire as $unCoproprietaire){
		?>
		<tr>
			<td><?= htmlspecialchars($unCoproprietaire->id) ?></td>
			<td><?= htmlspecialchars($unCoproprietaire->prenom) ?></td>
			<td><?= htmlspecialchars($unCoproprietaire->nom) ?></td>
			<td><?= htmlspecialchars($unCoproprietaire->id) ?></td>
			<td class="modifG"><i value="<?= $unCoproprietaire->id ?>" class="modifierCoproprietaireLine fas fa-cog fa-lg"></i><i value="<?= $unCoproprietaire->id ?>"ssss class="supprimerCoproprietaireCross fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
	<?php } ?>
	</table>
<a class="nav-link" href="index.php?act=ajouterCoproprietaireForm"><button type="submit" class="btn btnAdd"><i class="fas fa-plus"></i> Ajouter un copropriétaire</button></a>