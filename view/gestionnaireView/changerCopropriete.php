<h1 class="titrePage">Changer de copropriété</h1>
<table id="tableList">
	<?php
		foreach ($listeCopropriete as $uneCopropriete) {	
	 ?>
		<!--foreach Copropriétés répéter <tr>
			Changer background-color à chaque ligne -->
		<tr>
			<td><?= htmlspecialchars($uneCopropriete->nom) ?> (<?= htmlspecialchars($uneCopropriete->adresse) ?> - <?= htmlspecialchars($uneCopropriete->ville) ?>)</td>
			<td><i value="<?= $uneCopropriete->id ?>" class=" changerCoproprieteCheck checkCopropriete fas fa-check fa-lg"></i></td>
		</tr>
	<?php } ?>
	</table>