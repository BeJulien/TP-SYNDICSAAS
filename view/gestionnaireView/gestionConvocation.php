<h1 class="titrePage">Gestion des convocations</h1>


<h2 class="titrePage">Convocations</h2>
	<table id="tableList">
		<tr>
			<th>Copropriété</th>
			<th>Date</th>
			<th>Heure</th>
			<th>Lieu</th>
			<th class="text-center" id="relanceTab">Générer convocation</th>
		</tr>
		<?php foreach($listeConvocation as $uneConvocation){ ?>
		<tr>
			<td><?= htmlspecialchars($uneConvocation->idCopropriete) ?></td>
			<td><?= htmlspecialchars($uneConvocation->dateAssemblee) ?></td>
			<td><?= htmlspecialchars($uneConvocation->heureAssemblee) ?></td>
			<td><?= htmlspecialchars($uneConvocation->lieuAssemblee) ?></td>
			<td>
				<a href="./GenerationPDF/AFFICHAGE_Convocation.php?idConvocation=<?= $uneConvocation->id ?>" target="_blank"><button class="btn btn-secondary btn-sm">Générer PDF</button></a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<a class="nav-link" href="index.php?act=ajouterConvocationForm"><button type="submit" class="btn btnAdd"><i class="fas fa-plus"></i> Nouvelle convocation</button></a>