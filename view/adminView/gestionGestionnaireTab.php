	<h1 class="titrePage">Gestion des gestionnaires</h1>
	<table id="tableList">
		<tr>
			<th>Identifiant</th>
			<th>Prénom</th>
			<th>Nom</th>
		</tr>
		<!--foreach Gestionnaire répéter <tr>
			Changer background-color à chaque ligne -->
		<tr>
			<td>jano</td>
			<td>Jean</td>
			<td>Dupond</td>
			<td class="modifG"><i class="fas fa-cog fa-lg"></i><i class="fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
		<tr id="testLigne">
			<td>jano</td>
			<td>Jean</td>
			<td>Dupond</td>
			<td class="modifG"><i class="fas fa-cog fa-lg"></i><i class="fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
		<tr>
			<td>jano</td>
			<td>Jean</td>
			<td>Dupond</td>
			<td class="modifG"><i class="fas fa-cog fa-lg"></i><i class="fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
	</table>
	<div><a class="nav-link" href="index.php?act=ajouterGestionnaireForm"><button type="submit" class="btn btnAdd"><i class="fas fa-plus"></i> Ajouter un gestionnaire</button></a></div>
	<a href="index.php?act=modifierGestionnaireForm">Modifier (temporaire)</a>