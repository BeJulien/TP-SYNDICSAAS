
	<h1 class="titrePage">Gestion des copropriétés</h1>
	<table id="tableList">
		<tr>
			<th>Nom</th>
			<th>Ville</th>
			<th>Adresse</th>
			<th>Gestionnaire(s)</th>
		</tr>
		<!--foreach Copropriétés répéter <tr>
			Changer background-color à chaque ligne -->
		<tr>
			<td>Les immuables</td>
			<td>Rodez</td>
			<td>Rue des coquelicots</td>
			<td>Olivier Pierre</td>
			<td class="modifG"><i class="fas fa-cog fa-lg"></i><i class="fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
		<tr id="testLigne">
			<td>Les immuables</td>
			<td>Rodez</td>
			<td>Rue des coquelicots</td>
			<td>Olivier Pierre</td>
			<td class="modifG"><i class="fas fa-cog fa-lg"></i><i class="fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
		<tr>
			<td>Les immuables</td>
			<td>Rodez</td>
			<td>Rue des coquelicots</td>
			<td>Olivier Pierre</td>
			<td class="modifG"><i class="fas fa-cog fa-lg"></i><i class="fas fa-lg fa-times deleteCroix"></i></td>
		</tr>	
	</table>
	<a class="nav-link" href="index.php?act=ajouterCoproprieteForm"><button class="btn btnAdd"><i class="fas fa-plus"></i> Ajouter un copropriété</button></a>
	<a href="index.php?act=modifierCoproprieteForm">Modifier (temporaire)</a>
	
