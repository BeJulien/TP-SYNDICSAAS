
		<div class="d-flex justify-content-around mb-4">
			<div class="text-light text-center">
				Type d'échéance<br><input type="text" disabled id="typeEcheance">
			</div>
			<div class="text-light text-center">
				Budget<br><input type="text"  id="typeEcheance"><button id="modifierBudget" class=" mt-1 btn btnAdd">Modifier</button>
			</div>
			<div class="text-light text-center">
				Jours assemblés (mensuel)<br><input type="text"  id="typeEcheance"><button id="modifierEcheance" class=" mt-1 btn btnAdd">Modifier</button>
			</div>
		</div>


	<h2 class="titrePage">Retards de paiement</h2>
	<table id="tableList">
		<tr>
			<th>Copropriétaire</th>
			<th>Somme en retard</th>
			<th id="relanceTab">Relance</th>
		</tr>
		<!--foreach Copropriétés répéter <tr>
			Changer background-color à chaque ligne -->
		<tr>
			<td>...</td>
			<td>...</td>
			<td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
		</tr>
		<tr id="testLigne">
			<td>Les immuables</td>
			<td>Rodez</td>
			<td class="modifG"><i class="fas fa-lg fa-times deleteCroix"></i></td>
		</tr>
		<tr>
			<td>patriroche</td>
			<td>21,53 €</td>
			<td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
		</tr>
	</table>

	<h2 class="titrePage">Remontées d'informations</h2>
	<table id="tableList">
		<tr>
			<th>Copropriétaire</th>
			<th>Description</th>
			<th>Confirmation</th>
		</tr>
		<!--foreach Copropriétés répéter <tr>
			Changer background-color à chaque ligne -->
		<tr>
			<td>...</td>
			<td>...</td>
			<td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
		</tr>
		<tr id="testLigne">
			<td>babapopo</td>
			<td>Ampoule grillée rez de chaussée</td>
			<td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
		</tr>
		<tr>
			<td>...</td>
			<td>...</td>
			<td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
		</tr>

	</table>