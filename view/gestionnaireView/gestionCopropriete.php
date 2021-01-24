
		<div class="d-flex justify-content-around mb-4">
			<div class="text-light text-center">
				Type d'échéance<br><input class="form-control" value="<?= $typeEcheance ?>" type="text" disabled id="typeEcheance">
			</div>
			<div class="text-light text-center">
				Budget<br>
				<form method="POST" action="index.php?act=modifierBudget">
					<input value="<?= $budget ?>" type="number" class="form-control" id="budget" min="0" name="budget">
					<button id="modifierBudget" class="form-control mt-1 btn btnAdd">Modifier</button>
				</form>
			</div>
		</div>


	<h2 class="titrePage">Retards de paiement</h2>
	<table id="tableList">
		<tr>
			<th>Copropriétaire</th>
			<th>Somme en retard</th>
			<th class="text-center" id="relanceTab">Relance</th>
		</tr>
		<?php foreach ($retardTab as $unRetard) { ?>
		<tr>
			<td><?= htmlspecialchars($unRetard['prenom']).' '.htmlspecialchars($unRetard['nom']) ?></td>
			<td><?= htmlspecialchars($unRetard['SommeARegler']) ?></td>
			<td class="modifG">
				<?php if(!$unRetard['relance']) {?>
				<a href="./GenerationPDF/AFFICHAGE_Relance.php?idCoproprietaire=<?= $unRetard['idCoproprietaire'] ?>" target="_blank"><button class="btn btn-secondary btn-sm relancerRetardPaiement" value="<?= $unRetard['id'] ?>">Relancer</button></a>
				<?php }else{ ?>
					<i class="checkCopropriete fas fa-check fa-lg"></i>
				<?php }?>
			</td>
		</tr>
		<?php } ?>
	</table>

	<h2 class="titrePage">Remontées d'informations</h2>
	<table id="tableList">
		<tr class="text-center">
			<th>Copropriétaire</th>
			<th>Description</th>
			<th>Confirmation</th>
		</tr>
		<!--foreach Copropriétés répéter <tr>-->

	<?php foreach($remonteesTab as $uneRemontee){ ?>

		<tr>
			<td><?= htmlspecialchars($uneRemontee['prenom']).' '.htmlspecialchars($uneRemontee['nom']) ?></td>
			<td><?= htmlspecialchars($uneRemontee['description']) ?></td>
			<td class="modifG">
				<?php if($uneRemontee['incidentResolu'] == 0) { ?>
				<button class="btn btn-secondary btn-sm validerRemonteeInformation" value="<?= $uneRemontee['id'] ?>">Valider</button>
				<?php }else{ ?>
				<i class=" w-100 text-success fas fa-check fa-lg"></i>
				<?php } ?>
			</td>
		</tr>
	<?php }?>
	</table>