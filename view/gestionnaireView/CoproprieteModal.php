<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choisir une copropriété</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tableList">
		<!--foreach Copropriétés répéter <tr>
			Changer background-color à chaque ligne -->
		<tr>
			<td>Les immuables (Rue des coquelicots - RODEZ)</td>
			<td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
		</tr>
		<tr id="testLigne">
			<td>Les immuables (Rue des coquelicots - RODEZ)</td>
			<td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
		</tr>
		<tr>
			<td>Les immuables (Rue des coquelicots - RODEZ)</td>
			<td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
<button class="btn btnNav" id="changeCopropriete" data-toggle="modal" data-target="#modal">Changer de copropriété</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Changer de copropriété
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choisir une copropriété</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tableList">
    <!--foreach Copropriétés répéter <tr>
      Changer background-color à chaque ligne -->
    <tr>
      <td>Les immuables (Rue des coquelicots - RODEZ)</td>
      <td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
    </tr>
    <tr id="testLigne">
      <td>Les immuables (Rue des coquelicots - RODEZ)</td>
      <td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
    </tr>
    <tr>
      <td>Les immuables (Rue des coquelicots - RODEZ)</td>
      <td class="modifG"><i class="checkCopropriete fas fa-check fa-lg"></i></td>
    </tr>
  </table>
      </div>
    </div>
  </div>
</div>