
	<h1 class="titrePage">Gestion des biens</h1>
	<table id="tableList">
		<tr>
			<th>Propriétaire</th>
			<th>Type</th>
			<th>Description</th>
			<th>Surface</th>
			<th></th>
		</tr>
		<!--foreach Copropriétés répéter <tr>
			Changer background-color à chaque ligne -->
		<tr>
			<td>-</td>
			<td>Studio</td>
			<td>4ème étage</td>
			<td>13m²</td>
			<td class="modifG"><i class="fas fa-cog fa-lg"></i><i class="fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
		<tr id="testLigne">
			<td>babapopo</td>
			<td>Studio</td>
			<td>4ème étage</td>
			<td>13m²</td>
			<td class="modifG"><i class="fas fa-cog fa-lg"></i><i class="fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
		<tr>
			<td>patriroche</td>
			<td>Studio</td>
			<td>4ème étage</td>
			<td>13m²</td>
			<td class="modifG"><i class="fas fa-cog fa-lg"></i><i class="fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
	</table>

<a class="nav-link" href="index.php?act=ajouterBienForm"><button type="submit" class="btn btnAdd"><i class="fas fa-plus"></i> Ajouter un bien</button></a>

<a class="nav-link" href="index.php?act=modifierBienForm">Modifier (temporaire)</a>